<?php
require_once './app/controllers/producto.controller.php';
require_once './app/controllers/categoria.controller.php';
require_once './app/controllers/auth.controller.php';


define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'showProductos'; // accion por defecto
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// showProducts->               productoController->showProducto();
// showDetalle/:id ->           productoController->showDetalle($id);
// deleteProducto/:ID  ->       productoController->removeProducto($id); 
// updateProducto/:ID  ->       productoController->updateProducto($id);
// about ->                     aboutController->showAbout();
// login ->                     authContoller->showLogin();
// logout ->                    authContoller->logout();
// auth                         authContoller->auth(); // toma los datos del post y autentica al usuario

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

//Inicializo los controladores acá para no repetir codigo
$productoController = new ProductoController();
$categoriaController = new CategoriaController();
$authController = new AuthController();

switch ($params[0]) {
    case 'showProductos': 
        $productoController->showProductos();
    break;
    case 'showDetalle': 
        $productoController->showDetalle($params[1]);
    break;
    case 'showCategorias': 
        $categoriaController->showCategorias();
    break;
    case 'showByCategoria': 
        $productoController->showByCategoria($params[1]);
    break;
    case 'deleteProducto': 
        $productoController->deleteProducto($params[1]);
    break;
    case 'updateProducto': 
        $productoController->updateProducto();
    break;
    case 'formAddProducto': 
        $productoController->formAddProducto();
    break;
    case 'addProducto': 
        $productoController->addProducto();
    break;
    case 'deleteCategoria': 
        $categoriaController->deleteCategoria($params[1]);
    break;
    case 'formAddCategoria': 
        $categoriaController->formAddCategoria();
    break;
    case 'addCategoria': 
        $categoriaController->addCategoria();
    break;
    case 'formUpdateCategoria': 
        $categoriaController->formUpdateCategoria($params[1]);
    break;
    case 'updateCategoria': 
        $categoriaController->updateCategoria($params[1]);
    break;
    case 'showLogin':
        $authController->showLogin();
    break;
    case 'validate':
        $authController->validate();
    break;
    case 'logout':
        $authController->logout();
    break;
    default:
        $productoController->showProductos();
        break;
    
}
