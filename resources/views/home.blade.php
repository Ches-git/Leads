<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>My App</title>
</head>
<body>
<div id="app">
    <section class="section">
        <div class="container">
            <nav class="tabs is-boxed">
                <div class="container">
                    <ul>
                        <router-link tag="li" to="/" exact>
                            <a>Home</a>
                        </router-link>

                        <router-link tag="li" to="/another">
                            <a>Another</a>
                        </router-link>
                    </ul>
                </div>
            </nav>
            <router-view></router-view>
        </div>
    </section>
</div>

<script src="/js/app.js"></script>
</body>
</html>
