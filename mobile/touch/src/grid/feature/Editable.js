Ext.define('Ext.grid.feature.Editable', {
    extend   : 'Ext.grid.feature.Abstract',
    requires : 'Ext.grid.feature.Abstract',

    config : {
        events : {
            grid : {
                itemdoubletap : 'handleDoubleTap',
                itemtap       : 'handleTap'
            }
        },

        extraCls : 'editable',

        activeEditor : null
    },

    handleDoubleTap : function(grid, index, rowEl, rec, e) {
        var me     = this,
            target = e.getTarget('div.x-grid-cell'),
            cellEl = Ext.get(target);

        if (!cellEl) {
            return;
        }

        var dataIndex = cellEl.getAttribute('dataindex'),
            column    = grid.getColumn(dataIndex),
            editor    = column.editor,
            value     = rec.get(dataIndex),
            htmlValue = cellEl.getHtml();

        if (!editor) {
            return;
        }

        cellEl.setHtml('');

        Ext.apply(editor, {
            renderTo  : cellEl,
            value     : value,
            htmlValue : htmlValue,
            record    : rec,
            name      : dataIndex
        });

        editor.field = Ext.ComponentManager.create(editor);

        editor.field.on({
            scope  : me,
            blur   : 'onFieldBlur'
        });

        me.setActiveEditor(editor);

        grid.fireEvent('editstart', grid, me, editor, dataIndex, rec);
    },

    onFieldBlur : function () {
        this.endEdit();
    },

    handleTap : function(grid, index, rowEl, rec, e) {
        var editor = this.getActiveEditor();

        if (editor) {
            if (!e.getTarget('.x-field')) {
                this.endEdit(grid);
            }
        }
    },

    handleFieldDestroy: function(cellEl, htmlValue) {
        cellEl.setHtml(htmlValue);
    },

    endEdit : function(grid) {
        var me = this;

        if (!grid) {
            grid = me.getGrid();
        }

        var editor    = me.getActiveEditor(),
            field     = editor.field,
            component = field.getComponent(),
            value     = component.getValue(),
            isDirty   = field.isDirty(),
            renderTo  = field.getRenderTo();

        field.destroy();

        if (isDirty) {
            editor.record.set(field.getName(), value);
            grid.refresh();

            grid.fireEvent('editend', grid, me, editor, value);
        } else {
            renderTo.setHtml(editor.htmlValue);

            grid.fireEvent('editcancel', grid, me, editor, value);
        }

        me.setActiveEditor(null);
    }
});