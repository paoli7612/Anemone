<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3pro.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>Document</title>

    <style>
        button {
            width: 20%;
            height: 90px;
            margin: 0.5%;
            font-size: 24px;
        }
    </style>
</head>

<body>
    <script type="importmap">
        {
          "imports": {
            "vue": "https://unpkg.com/vue@3/dist/vue.esm-browser.js"
          }
        }
    </script>

    <div id="app">
        <a href="/">back...</a>

        <Order :style="{visibility: order ? 'visible' : 'hidden'}">
            <Order-list>

            </Order-list>

        </Order>
        <Pager :style="{visibility: pager ? 'visible' : 'hidden'}">
            <Item v-for="n in 20" :title="n"></Item>
            <div class="w3-panel">
                <Delivery title="Deliveroo" color="blue"></Delivery>
                <Delivery title="Glovo" color="amber"></Delivery>
                <Delivery title="JustEat" color="orange"></Delivery>
                <Delivery title="UberEats" color="green"></Delivery>
                <Item title="X" :class="w3-right"></Item>
            </div>
        </Pager>
    </div>

    <script type="module">
        import Item from './calculator/components/Item.js';
        import Delivery from './calculator/components/Delivery.js';
        import OrderList from './calculator/components/OrderList.js';

        import Pager from './calculator/components/screen/Pager.js';
        import Order from './calculator/components/screen/Order.js';

        import { createApp } from 'vue';
        const app = createApp({
            data() {
                return {
                    'header': 'Hello Vue!',
                    'pager': true,
                    'order': false,
                }
            },
        });

        app.component('Item', Item);
        app.component('Delivery', Delivery);
        app.component('Order-ist', OrderList);
        
        app.component('Pager', Pager);
        app.component('Order', Order);
        app.mount('#app');
    </script>
</body>

</html>