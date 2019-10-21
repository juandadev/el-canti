<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>

    <title>Antojitos "El Cantinflas"</title>

    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="fontawesome/css/all.css">
</head>

<body>
    <div class="wrap" id="wrap">
        <header>
            <div class="logo" id="logo">
                <img src="img/cantinflas-logo.png" alt="Antojitos 'El Cantinflas'">
            </div>

            <a href="php/logout.php" class="logout" id="logout">
                <div>
                    <i class="fas fa-sign-out-alt"></i>Cerrar sesión
                </div>
            </a>
        </header>

        <div class="menu" id="menu">
            <ul>
                <a href="index.php?view=home">
                    <li>
                        <i class="fas fa-home"></i> Inicio
                    </li>
                </a>

                <a href="index.php?view=sales">
                    <li>
                        <i class="fas fa-shopping-cart"></i> Ventas
                    </li>
                </a>

                <a href="index.php?view=reports">
                    <li>
                        <i class="fas fa-chart-line"></i> Reportes
                    </li>
                </a>

                <a href="index.php?view=users">
                    <li>
                        <i class="fas fa-users"></i> Usuarios
                    </li>
                </a>
            </ul>
        </div>

        <div class="wrapped-content" id="wrapped-content">
            <?php
            switch ($view) {
                case 'home':
                    require 'views/home.view.php';
                    break;
                
                case 'sales':
                    require 'views/sales.view.php';
                    break;
                    
                case 'reports':
                    require 'views/reports.view.php';
                    break;
                    
                case 'users':
                    require 'views/users.view.php';
                    break;
            }
            ?>
        </div>
    </div>

    <script>
        var selectIng = document.getElementById('selectIng');
        var selectFood = document.getElementById('selectFood');
        var form = document.getElementById('orderList');
        var items = document.getElementsByClassName('items');
        var check = document.getElementsByClassName('check');
        var warning = document.getElementById('warning');
        var noItem = document.getElementById('noItem');

        function addItem(name, id) {
            selectIng.style.display = 'flex';

            var newInput = document.createElement("INPUT");
            newInput.type = 'text';
            newInput.setAttribute('name', 'item' + (items.length + 1));
            newInput.setAttribute('value', id);
            newInput.setAttribute('class', 'hidden');

            var newDiv = document.createElement('div');
            newDiv.setAttribute('class', 'items');
            newDiv.setAttribute('id', 'itemOrder' + (items.length + 1));
            newDiv.setAttribute('ondblclick', 'deleteItem(this)');
            newDiv.innerText = name;
            newDiv.dataset.num = items.length + 1

            selectFood.style.display = 'none';
            form.appendChild(newDiv);
            items[items.length - 1].appendChild(newInput);
        }

        function addItemIng(name, id) {
            selectFood.style.display = 'flex';
            selectIng.style.display = 'none';

            var newInput = document.createElement("INPUT");
            newInput.type = 'text';
            newInput.setAttribute('name', 'id' + (items.length));
            newInput.setAttribute('value', id);
            newInput.setAttribute('readonly', '');
            newInput.setAttribute('class', 'hidden');

            items[items.length - 1].appendChild(newInput);

            var newCheck = document.createElement("INPUT");
            newCheck.type = 'checkbox';
            newCheck.setAttribute('name', 'check' + (items.length));
            newCheck.setAttribute('id', 'check' + (items.length));

            var newLabel = document.createElement("label");
            newLabel.setAttribute('for', 'check' + (items.length));
            newLabel.setAttribute('class', 'check');

            var newSpan = document.createElement("span");

            items[items.length - 1].appendChild(newCheck);
            items[items.length - 1].appendChild(newLabel);
            check[check.length - 1].appendChild(newSpan);
        }

        function accept() {
            if (items.length == 0) {
                warning.style.display = 'block';
            } else {
                var itemCount = items[items.length -1].dataset
                
                form.submit();
            }
        }

        function closeDeliver() {
            warning.style.display = 'none';
        }

        function deleteItem(id) {
            form.removeChild(id);
        }

    </script>
</body>

</html>
