<?php
namespace Router;
use Controller\AuthController;
use DatabaseConfig\DatabaseConfig;
use DB\MysqlDatabaseService;
use Repository\LoginRepository;
class Router
{
    private AuthController $authCtrl;
    public function __construct()
    {
        $db = new MysqlDatabaseService(new DatabaseConfig());
        $authRepo = new LoginRepository($db);
        $this->authCtrl = new AuthController($authRepo);
    }
    public function handle(): void
    {
        $act = $_GET['act'] ?? 'home';
        if (in_array($act, ['registration', 'login', 'logout'], true)) {
            Csrf::validatePost();
        }
        if (isset($_SESSION['email']) && in_array($act, ['login', 'registration', 'loginView', 'registrationView'], true)) {
            header('Location: index.php?act=account');
            exit;
        }
        switch ($act) {
            case 'loginView':
                $this->authCtrl->loginView();
                break;
            case 'registrationView':
                $this->authCtrl->registrationView();
                break;
            case 'login':
                $this->authCtrl->login();
                break;
            case 'registration':
                $this->authCtrl->registration();
                break;
            case 'logout':
                $this->authCtrl->logout();
                break;
            case 'account':
                if (!isset($_SESSION['email'])) {
                    header('Location: index.php?act=loginView');
                    exit;
                }
                include dirname(__DIR__) . '/views/account.php';
                break;
            case 'home':
                include dirname(__DIR__) . '/views/home.php';
                break;
            default:
                http_response_code(404);
                echo 'Page not found.';
        }
    }
}
