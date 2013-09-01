
Ext.define("search", {
    extend: "Ext.data.Model",
                                    type: 'tree',

                                root: {
                                    leaf: false
                                },
    config: {
        fields: [
            {name: "name", type: "string"},
            {name: "filmpage",  type: "string"},
            {name: "id",       type: "int"},
            {name: 'leaf', defaultValue: true},
            
        ]
    }
});
var search = Ext.create("Ext.data.Store", {
                                    type: 'tree',

                                root: {
                                    leaf: false
                                },
    storeId: "search",
    model: "search",
    proxy: {
        type: 'jsonp',
        url: 'http://now-yakutsk.stairwaysoft.net/frontmodel/search.php',
        reader: {
            type: 'json',
            rootProperty: 'films',
        }
    },
    autoLoad: true
});



