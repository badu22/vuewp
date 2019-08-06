<?php
/**
 * Temeljna konfiguracija WordPressa.
 *
 * wp-config.php instalacijska skripta koristi ovaj zapis tijekom instalacije.
 * Ne morate koristiti web stranicu, samo kopirajte i preimenujte ovaj zapis
 * u "wp-config.php" datoteku i popunite tražene vrijednosti.
 *
 * Ovaj zapis sadrži sljedeće konfiguracije:
 *
 * * MySQL postavke
 * * Tajne ključeve
 * * Prefiks tablica baze podataka
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL postavke - Informacije možete dobiti od vašeg web hosta ** //
/** Ime baze podataka za WordPress */
define( 'DB_NAME', 'vuewp' );

/** MySQL korisničko ime baze podataka */
define( 'DB_USER', 'root' );

/** MySQL lozinka baze podataka */
define( 'DB_PASSWORD', '' );

/** MySQL naziv hosta */
define( 'DB_HOST', 'localhost' );

/** Kodna tablica koja će se koristiti u kreiranju tablica baze podataka. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Tip sortiranja (collate) baze podataka. Ne mijenjate ako ne znate što radite. */
define('DB_COLLATE', '');

/**#@+
 * Jedinstveni Autentifikacijski ključevi (Authentication Unique Keys and Salts).
 *
 * Promijenite ovo u vaše jedinstvene fraze!
 * Ključeve možete generirati pomoću {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org servis tajnih-ključeva}
 * Ključeve možete promijeniti bilo kada s tim da će se svi korisnici morati ponovo prijaviti jer kolačići (cookies) neće više važiti nakon izmjene ključeva.
 *
 * @od inačice 2.6.0
 */
define( 'AUTH_KEY',         '5`R&;na+f(>Bg;7eH7WfUm7`&pn*O*L{ A6e*!(t~U#f9Gqq,>;aY:}5bw{#U15p' );
define( 'SECURE_AUTH_KEY',  '%8j&+/up4r}c(!_zhdihrPxqON_/{+j@A9G7xHQG0U(WUZ]=tWn0afkEdg3ifdGe' );
define( 'LOGGED_IN_KEY',    '<oY!{>6Pg/S1sIJGgKkM=j!2~`5R*=2+_RfUA^v1x[OjD]X(HPP4OoP$%xx/]:F,' );
define( 'NONCE_KEY',        ' &8r>Kx)n-D|aYxQc,BtTG8Rs]B&v1@:Nl*_Z^&;-fcRh/kd#{T|<z.$. W=U7g0' );
define( 'AUTH_SALT',        'bI:L.zVE_#BwsRO>0nboBPB!4~N}*xT9!tC}jo{S]&L{QydYtXO-22`#fO(7v5L1' );
define( 'SECURE_AUTH_SALT', 'H>ztXWvDop%Lq*lHlc%Oa)+UG>/84h:k<yQF4D|Nw])sIkdlbV@#DqVy4|BEC~jA' );
define( 'LOGGED_IN_SALT',   'z]-v83?|@`5[+d713P#USOP$^m6,T!XOPcqPu/Y4O]):_F6C7:ZT;O)4Mbd-7W`H' );
define( 'NONCE_SALT',       '.v+LY#[TKM7I)L~?%9;GOXq)jU4#jnSHZvQXJW,IsQ`tgzM):3/YrD[a1Hy|3Oq@' );

/**#@-*/

/**
 * Prefix WordPress tablica baze podataka.
 *
 * Možete imati više instalacija unutar jedne baze podataka ukoliko svakoj dodjelite
 * jedinstveni prefiks. Koristite samo brojeve, slova, i donju crticu!
 */
$table_prefix  = 'wp_';

/**
 * Za programere: WordPress debugging mode.
 *
 * Promijenit ovo u true kako bi omogućili prikazivanje poruka tijekom razvoja.
 * Izrazito preporučujemo da programeri dodataka (plugin) i tema
 * koriste WP_DEBUG u njihovom razvojnom okružju.
 *
 * Za informacije o drugim konstantama koje se mogu koristiti za debugging,
 * posjetite Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* To je sve, ne morate više ništa mijenjati! Sretno bloganje. */

/** Apsolutna putanja do WordPress mape. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Postavke za WordPress varijable i već uključene zapise. */
require_once(ABSPATH . 'wp-settings.php');
