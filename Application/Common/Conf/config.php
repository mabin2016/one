<?php
/**
 * 系统配文�?
 * 所有系统级别的配置
 */
 
$web_domain = 'www.seekrice.com'; // 网站网址
$img_domain = 'img.seekrice.com';		//图片网址
$down_domain = 'download.seekrice.com'; //下载网址

return array(
    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common', 'User'),
    'MODULE_ALLOW_LIST'  => array('Home','Admin','AdminScut'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '6/+ZHv=BLc2$-8o"*|]9#S[tPnQh,yimIw4J{Kg!', //默认数据加密KEY

    /* 调试配置 */
    'SHOW_PAGE_TRACE' => true,

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小�?true则表示不区分大小�?
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割�?

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配�?*/
    'DB_TYPE'   => 'mysqli', // 数据库类�?
    'DB_HOST'   => '67.218.140.159', // 服务器地址
//     'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'one', // 数据库名
    'DB_USER'   => 'develop', // 用户�?
    'DB_PWD'    => 'binma123...',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'one_', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更�? */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),
	
	'SITE' => str_replace('\\','/', dirname(dirname(dirname(dirname(__FILE__))))), //网站根目�?
	//模板缓存配置
	'TMPL_CACHE_ON' => false,//禁止模板编译缓存
	'HTML_CACHE_ON' => false,//禁止静态缓�?
	//网站名称
//		'WEB_NAME'			=> 'mysite',
	
	 //'配置�?=>'配置�?
	//url配置
	'URL_CASE_INSENSITIVE' =>true,
	'URL_MODEL'             =>  2,//URL模式
	'SESSION_PREFIX'        =>  'ch',
	'SESSION_OPTIONS' => array(
			'name' => 'mysite',
			'expire' => 86400
	),
	
	//����
	'WEB_DOMAIN'		=> $web_domain,
	'WEB_HTTP_DOMAIN' => 'http://'.$web_domain.'/',
	'IMG_DOMAIN' => $img_domain,
	'IMG_HTTP_DOMAIN' => 'http://'.$img_domain.'/Uploads/File/',
	'IMG_REAL_PATH' => '/data/html/one/Uploads/File/',					//ͼƬ����·��
	'DOWNLOAD_DOMAIN' => $down_domain,
	'DOWNLOAD_HTTP_DOMAIN' => 'http://'.$down_domain.'/',
	'DOWNLOAD_REAL_PATH' => '/data/downloads/mihui/',	//����Ŀ¼�����ַ
);
