wp.customize.controlConstructor['businesswp-toggle'] = wp.customize.businesswpDynamicControl.extend( {

	// When we're finished loading continue processing
	ready: function () {
		'use strict';

		var control = this;

		// Init the control.
		if (
			!_.isUndefined( window.businesswpControlLoader ) &&
			_.isFunction( businesswpControlLoader )
		) {
			businesswpControlLoader( control );
		} else {
			control.initbusinesswpControl();
		}
	},

	initbusinesswpControl: function () {
		var control       = this,
		    checkboxValue = control.setting._value;

		// Save the value
		this.container.on( 'change', 'input', function () {
			checkboxValue = jQuery( this ).is( ':checked' ) ? true : false;
			control.setting.set( checkboxValue );
		} );
	}
} );