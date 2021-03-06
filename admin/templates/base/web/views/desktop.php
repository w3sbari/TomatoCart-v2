<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * TomatoCart Open Source Shopping Cart Solution
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License v3 (2007)
 * as published by the Free Software Foundation.
 *
 * @package      TomatoCart
 * @author       TomatoCart Dev Team
 * @copyright    Copyright (c) 2009 - 2012, TomatoCart. All rights reserved.
 * @license      http://www.gnu.org/licenses/gpl.html
 * @link         http://tomatocart.com
 * @since        Version 2.0
 * @filesource
*/
?>

/*
 * Desktop configuration
 */

Ext.onReady(function () {
  var TocDesktop;
  
  TocDesktop = new Toc.desktop.App({
    startConfig: {
      title : "<?php echo $username; ?>"
    },
    
    /**
     * Return modules.
     */
    getModules: function() {
      return <?php echo $modules; ?>;
    },
    
    /**
     * Return the launchers object.
     */
    getLaunchers : function(){
      return <?php echo $launchers; ?>;
    },
    
    /**
     * Return the Styles object.
     */
    getStyles : function(){
      return <?php echo $styles; ?>;
    },
    
    onLogout: function() {
      Ext.Ajax.request({
        url: Toc.CONF.CONN_URL,
        params: {
          action: 'logoff',
        },
        callback: function(options, success, response) {
          result = Ext.decode(response.responseText);
          
          if (result.success == true) {
            window.location = "<?php echo base_url(); ?>";
          }
        }
      });
    },
    
    onSettings: function() {
      var winSetting = this.getDesktopSettingWindow();
      
      winSetting.show();
    }
  });
});

<?php echo $output; ?>
