<?php // (C) Copyright Bobbing Wide 2012-2015
if ( !defined( 'OIK_BWTRACE_BOOT_INCLUDED' ) ) {
define( 'OIK_BWTRACE_BOOT_INCLUDED', "2.0.7" );
define( 'OIK_BWTRACE_BOOT_FILE', __FILE__ );

/**
 * Initialise tracing and action counting when WordPress is not yet loaded
 *
 * This file should only be loaded when 'BW_TRACE_CONFIG_STARTUP' is true.
 *
 * When this is the case, trace will be initialised using default values for trace logging.
 * 
 * Constants that we deal with are:
 * 
 * `
 * define( 'BW_TRACE_ON', true );
 * define( 'BW_COUNT_ON', true );
 * define( 'BW_TRACE_RESET', true );
 * `
 *
 * If BW_TRACE_RESET is true then the trace log file is reset.
 * Note: This can cause problems when Ajax requests are coming in.
 *
 */ 
if ( defined( 'BW_TRACE_CONFIG_STARTUP' ) && BW_TRACE_CONFIG_STARTUP ) {
	if ( !defined( "bw_trace_config_startup" ) ) {
		function bw_trace_config_startup() {
			// Should this assume the same dir as __FILE__ - ie. always load from "oik" **?**
			require_once( __DIR__ . '/oik_boot.php' );
		
			/* Once oik_boot is loaded we can use oik_require2()
			 * We load this up regardless of the defined values... assuming at least one of the values is set.
			 */
			oik_require2( "includes/bwtrace-config.php", "oik-bwtrace" );
			bw_lazy_trace_config_startup();
		}
	}
	bw_trace_config_startup();
} 

} /* end !defined */

