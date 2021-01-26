<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'mariana' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'q5yLZuIi+lUP]I% UD.mR}k+q7;K-is/:~wLHV}?_8GPP#Z:j%GngH8Q+a>/uQdc' );
define( 'SECURE_AUTH_KEY',  '1qoM)}Wh)@b:ZJO[+x00PlVLejLatGg6zz?mmBz%m~(skImZ`-)+,x`,n4w9+J#d' );
define( 'LOGGED_IN_KEY',    '8A-sF=iqrL8p$6+uOnK35`2t[MQd2b,:P-M aVgC:=Jch8)/S<M=kiYHxKK%LmL{' );
define( 'NONCE_KEY',        '}2/bH0*%AwCjwoyMYpiSsa(]cIbM+.>P*gYJTtmk-HBRPi>BqQYQZHc2Y=2FfS6G' );
define( 'AUTH_SALT',        '=G>6T-]!UUd`VkHWd,P.5e(-~?pz~//G.6?g*H}<i=#02x3g0_w8F8!V-.Eva<!3' );
define( 'SECURE_AUTH_SALT', '[[>^^PP<,7zkYJSAhOQ|6DHtW4TReXscqjnlv?eC~dY^k>|@NEZ4@S`iL9Fochsq' );
define( 'LOGGED_IN_SALT',   'dx=n%5!On)EJ}C*N?EhF7FY~_VSN<B!MuVB<PV@>;f.vV1E(24GiEdI|Bsp~`7%&' );
define( 'NONCE_SALT',       '/3| *+j9v|Jyq5w<-1`HRu2:nyT|?m&lQ~P:bGaj9n|<Q+DoYH~fwBo(@)UChjd@' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'wp_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
