<?php
/**
 * WordPress基础配置文件。
 *
 * 这个文件被安装程序用于自动生成wp-config.php配置文件，
 * 您可以不使用网站，您需要手动复制这个文件，
 * 并重命名为“wp-config.php”，然后填入相关信息。
 *
 * 本文件包含以下配置选项：
 *
 * * MySQL设置
 * * 密钥
 * * 数据库表名前缀
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/zh-cn:%E7%BC%96%E8%BE%91_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL 设置 - 具体信息来自您正在使用的主机 ** //
/** WordPress数据库的名称 */
define( 'DB_NAME', 'dr_db' );

/** MySQL数据库用户名 */
define( 'DB_USER', 'root' );

/** MySQL数据库密码 */
define( 'DB_PASSWORD', 'root' );

/** MySQL主机 */
define( 'DB_HOST', 'localhost' );

/** 创建数据表时默认的文字编码 */
define( 'DB_CHARSET', 'utf8mb4' );

/** 数据库整理类型。如不确定请勿更改 */
define( 'DB_COLLATE', '' );

/**#@+
 * 身份认证密钥与盐。
 *
 * 修改为任意独一无二的字串！
 * 或者直接访问{@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org密钥生成服务}
 * 任何修改都会导致所有cookies失效，所有用户将必须重新登录。
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'JxKW2t} 7L[WA?{MQ3DIlfB|B3{5/L_02@4L;>%jHT&eN]8Ff,8/sMx+gi2q/ ;z' );
define( 'SECURE_AUTH_KEY',  '[?)%jKZ>.VPR;sMIQ|X7G^7ww<R}iorLp85g9h&;qxCQEsv#uw)3NG,dQloW>4o+' );
define( 'LOGGED_IN_KEY',    'A6 F:6yKjKGcOnV5]Q4Q_K(Ap[8FyU_X&#J^G@.ZG#foX=4RX^N@sTH7(385au{&' );
define( 'NONCE_KEY',        'O0U *<0afsAm#@?@6y&hGr%58)b87I+;S5M?@_K2LbaIR9^s>tBJ9v41Jo>lGl/^' );
define( 'AUTH_SALT',        ':?S@Ls|;GmJTCJ7cT}+?JQ{im,@48Ej2-wA>kq^H2|2Z%tHs~C*i&Wcs7a IGd.5' );
define( 'SECURE_AUTH_SALT', 'iA?O+1Kw}J~gq9DdJqT042fEgQEa.R{w,(M^R8XlKQYGXvqKg0mgzHY-q/z|8CLS' );
define( 'LOGGED_IN_SALT',   'GVd`z(VqypOWsWZoGa$!X+x u.&|5rGDU9&@56jRdO@QlRq}nJ0uFR43 W%22#17' );
define( 'NONCE_SALT',       'KU._t>BrwOfTtHiV<b).qeU+(/zOy}yFn 0o6I(e5U)5LmlA5G0tn4x4n&@N)j/@' );

/**#@-*/

/**
 * WordPress数据表前缀。
 *
 * 如果您有在同一数据库内安装多个WordPress的需求，请为每个WordPress设置
 * 不同的数据表前缀。前缀名只能为数字、字母加下划线。
 */
$table_prefix = 'dr_';

/**
 * 开发者专用：WordPress调试模式。
 *
 * 将这个值改为true，WordPress将显示所有用于开发的提示。
 * 强烈建议插件开发者在开发环境中启用WP_DEBUG。
 *
 * 要获取其他能用于调试的信息，请访问Codex。
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* 好了！请不要再继续编辑。请保存本文件。使用愉快！ */

/** WordPress目录的绝对路径。 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** 设置WordPress变量和包含文件。 */
require_once( ABSPATH . 'wp-settings.php' );
