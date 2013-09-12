/*
    This file is generated and updated by Sencha Cmd. You can edit this file as
    needed for your application, but these edits will have to be merged by
    Sencha Cmd when it performs code generation tasks such as generating new
    models, controllers or views and when running "sencha app upgrade".

    Ideally changes to this file would be limited and most work would be done
    in other places (such as Controllers). If Sencha Cmd cannot merge your
    changes and its generated code, it will produce a "merge conflict" that you
    will need to resolve manually.
*/

// DO NOT DELETE - this directive is required for Sencha Cmd packages to work.
//@require @packageOverrides

//<debug>
Ext.Loader.setPath({
    'Ext': 'touch/src'
});
//</debug>

Ext.application({
    name: 'front',

    requires: [
        'Ext.MessageBox',
        'Ext.data.Store',
        'Ext.data.proxy.Sql',
        'Ext.dataview.NestedList',
        'Ext.data.proxy.JsonP',
        'Ext.tab.Panel',
        'Ext.carousel.Carousel',
        'Ext.grid.List',
        'Ext.grid.feature.Abstract',
        'Ext.grid.feature.CheckboxSelection'
      ],

    views: [
        'Main'
    ],

    icon: {
        '57': 'resources/icons/Icon.png',
        '72': 'resources/icons/Icon~ipad.png',
        '114': 'resources/icons/Icon@2x.png',
        '144': 'resources/icons/Icon~ipad@2x.png'
    },

    isIconPrecomposed: true,

    startupImage: {
        '320x460': 'resources/startup/320x460.jpg',
        '640x920': 'resources/startup/640x920.png',
        '768x1004': 'resources/startup/768x1004.png',
        '748x1024': 'resources/startup/748x1024.png',
        '1536x2008': 'resources/startup/1536x2008.png',
        '1496x2048': 'resources/startup/1496x2048.png'
    },

    launch: function() {
        // Destroy the #appLoadingIndicator element

        Ext.fly('appLoadingIndicator').destroy();

        //console.log(navigator.onLine);
        if(navigator.onLine ==  false)
        {
            Ext.fly('appLoadingIndicator').destroy();
            Ext.Viewport.add(Ext.create('front.view.Main'));
        }
        else{
            /*Ext.Msg.confirm("<div style='width: 0px; background: none;'></div>", "<div style='width: 320px; height: 262px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) center no-repeat;'><p style='color: #fff; font: 30px Hlvl; text-align: center; padding: 85px 0 33px;'>Ошибка подключения к сети интернет</p><div>", function(){
            });*/
            function myConfirm(msg, func){
                var div=document.createElement('div');
                div.style.cssText="text-align:center;padding:10px;position:fixed;width:200px;height:40px;bottom:50%;right:50%;margin-right:-100px;margin-bottom:-20px;border:1px dotted #000"
                div.onclick=function(e){
                    var t=e?e.target:window.event.srcElement;
                    if(t.tagName=='INPUT'){
                        t.value=='Обновить'&&func('да');
                        this.parentNode.removeChild(this)
                    }
                }
                div.innerHTML="<div style='margin-top: -100px; margin-left: -50px; width: 320px; height: 262px; position:absolute; z-index: 10000; background: url(./img/error_wind.png) center no-repeat;'><p style='color: #fff; font: 30px Hlvl; text-align: center; padding: 85px 0 33px;'>Ошибка подключения к сети интернет</p><input class='x-msgbox-buttons' type='button' value='Настройки'><input class='x-msgbox-buttons' type='button' value='Обновить'></div>";
                return document.body.appendChild(div);
            }
            myConfirm('сообщение ', alert);


            Ext.Viewport.add(Ext.create('front.view.Main'));
        }
        // Initialize the main view


    },

    onUpdated: function() {
        Ext.Msg.confirm(
            "Application Update",
            "This application has just successfully been updated to the latest version. Reload now?",
            function(buttonId) {
                if (buttonId === 'yes') {
                    window.location.reload();
                }
            }
        );
    }
});

