<?php

namespace App\core;

use App\App;
use App\Models\Theme;
use PDO;

class Database
{
    private static $pdo;
    private static $config;

    public static function reset()
    {
        Database::$pdo = new \PDO("mysql:host=" . self::$config['host'], self::$config['username'], self::$config['password']);
        $query = file_get_contents("database.sql");
        Database::query($query);
    }

    public static function get($id, $model, $table)
    {
        return Database::select($table, $model, "id=$id")[0];
    }

    public static function all($model, $table, $max=null)
    {
        if ($max) {
            return array_slice(Database::select($table, $model), 0, $max);
        } else {
            return Database::select($table, $model);
        }
    }

    public static function init()
    {
        self::$config = App::$config['database'];
        try {
            self::$pdo = new \PDO(
                "mysql:host=" . self::$config['host'] . ";dbname=" . self::$config['dbname'],
                self::$config['username'],
                self::$config['password']
            );
        } catch (\PDOException $exception) {
            if ($exception->getCode() == 1049) { // database non creato
                self::reset();
            } else {
                include view('errors/2002');
                die();
            }
        }
    }

    public static function query($query, $model='')
    {
        // echo $query . '<br>';
        $s = self::$pdo->prepare($query);
        $s->execute();
        if ($model == '') {
            return $s->fetchAll();
        } else {
            return $s->fetchAll(PDO::FETCH_CLASS, $model);
        }
    }

    public static function select($table, $model, $where = '')
    {
        if ($where == '') {
            return self::query("SELECT * FROM $table", $model);
        } else {
            return self::query("SELECT * FROM $table WHERE $where", $model);
        }
    }

    public static function create($table, $columns, $values)
    {
        $query = "INSERT INTO $table (";
        foreach ($columns as $c) {
            $query = $query . "`$c`,";
        }
        $query = substr($query, 0, -1) . ') VALUES (';
        foreach ($values as $c) {
            $query = $query . "'$c',";
        }
        $query = substr($query, 0, -1) . ');';
        self::query($query);
    }

    public static function delete($table, $where)
    {
        self::query("DELETE FROM $table WHERE $where;");
    }

    public static function deleteAll($table)
    {
        self::query("DELETE FROM `$table` where 1<2");
    }

    public static function p_print()
    {
        print_r(self::query("SELECT * FROM users"));
        print_r(self::query("SELECT * FROM drinks"));
        print_r(self::query("SELECT * FROM ingredients"));
    }

    public static function update($table, $changes, $id)
    {
        $sql = "UPDATE $table SET ";
        foreach ($changes as $key => $value) {
            $sql = "$sql $key='$value', "; 
        }
        $sql = substr($sql, 0, -2);
        $sql = "$sql WHERE id='$id'";
        Database::query($sql);
    }
}

Database::init();
