# Create your own MVC Framework

## Singleton Design Pattern

Creating Application instance using Singleton Design Pattern

```

private static Application|null $instance = null;

    public static function instance(string $path = null): self
    {
        if(!self::$instance)
        {
            self::$instance = new self($path);
        }

        return self::$instance;
    }

```

## Application Boot() Method

Creating boot() method for Application class under system directory.

```

public function boot(): void 
    {
        try{
            app();
            // $appConfig = include $this->path('config/app.php');
            // $appConfig = include app()->path('config/app.php');
            $appConfig = loadConfig('app.php');
            $this->providers = array_merge($this->providers, $appConfig['providers']);

            echo readConfig('Services.database');

            foreach($this->providers as $provider)
            {
                $providerObject = new $provider();

                if($providerObject instanceof ProviderInterface)
                {
                    $providerObject->boot();
                } else {
                    throw new Exception($provider . ' does not implement ' . ProviderInterface::class);
                }
            }
        } catch(Exception $exception) {
            echo $exception->getMessage();
        }
    }

```

## Global Function

Making some necessary global functions for the entire application.

### app() method

```

function app(): Application
{
    echo "\nApp from Global Function";

    return Application::instance();
}

```

### loadConfig() method

```

function loadConfig($path)
{
    $path = app()->path('config/' . $path);

    return file_exists($path) ? include $path : "Path does not exist!";
}

```

### readConfig() method

```

function readConfig($path)
{
    $path = explode(".", $path);
    $data = loadConfig($path[0] . '.php');
    
    return $data[$path[1]];
}

```