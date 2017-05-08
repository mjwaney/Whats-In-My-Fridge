$env = $app->detectEnvironment(function()
{
    return getenv('ENV') ?: 'development';
});