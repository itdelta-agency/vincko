<?
use Bitrix\Main\IO\File;

spl_autoload_register(function($class) {
	$cachePath = __DIR__. '/__autoload.cache.php';
	$classCache = include $cachePath;
	if(!is_array($classCache)) $classCache = array();
	$classPath = DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

	if(array_key_exists($class, $classCache) && file_exists($classCache[$class])) {
		return include $classCache[$class];
	}

	$cachePrefixes = array_merge([
		$_SERVER['DOCUMENT_ROOT'] . '/local/php_interface/lib',
		$_SERVER['DOCUMENT_ROOT'] . '/bitrix/php_interface/lib',
		__DIR__
	], (array) $GLOBALS["__autoload_paths"]);

	foreach ($cachePrefixes as $prefix) {
		$__path = $prefix . $classPath;
		if(!file_exists($__path)) continue;
		$classCache[$class] = $__path;
		File::putFileContents($cachePath, '<? return ' . var_export($classCache, true) . ';');
		return include $__path;
	}

	return false;
});