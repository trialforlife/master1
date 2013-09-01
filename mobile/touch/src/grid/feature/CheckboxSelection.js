Ext.define('Ext.grid.feature.CheckboxSelection', {
    extend   : 'Ext.grid.feature.Abstract',
    requires : 'Ext.grid.feature.Abstract',

    config : {
        events : {
            headerEl : {
                tap : 'onHeaderTap'
            }
        },

        checkboxCls     : 'grid-checkbox',
        checkboxCellCls : 'checkbox-cell'
    },

    init : function(grid) {
        var columns = grid.getColumns(),
            cls     = this.getCheckboxCls(),
            cellCls = this.getCheckboxCellCls();

        columns = [
            {
                width          : 100,
                cls            : cellCls,
                dataIndex      : 'checkbox_selection',
                headerRenderer : function () {
                    return '<div class="' + cls + '">&nbsp;</div>';
                },
                renderer       : function () {
                    return '<div class="' + cls + '">&nbsp;</div>';
                }
            }
        ].concat(columns);

        grid.setMode('MULTI');
        grid.setColumns(columns);
    },

    onHeaderTap : function(e) {
        var me         = this,
            grid       = me.getGrid(),
            cls        = me.getCheckboxCellCls(),
            isCheckbox = !!e.getTarget('.' + cls);

        if (isCheckbox) {
            if (me.isAllSelected(grid)) {
                grid.deselectAll();
            } else {
                grid.selectAll();
            }
        }
    },

    isAllSelected : function(grid) {
        if (!grid) {
            grid = this.getGrid();
        }

        var store         = grid.getStore(),
            isAllSelected = true;

        store.each(function(record) {
            if (!grid.isSelected(record)) {
                isAllSelected = false;
            }
        });

        return isAllSelected;
    }
});