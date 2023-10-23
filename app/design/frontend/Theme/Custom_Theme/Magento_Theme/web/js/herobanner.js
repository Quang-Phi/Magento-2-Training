define([
    'ko',
    'jquery',
    'uiComponent'
], function (ko, $, Component) {
    'use strict';

    return Component.extend({
        initialize: function () {
            this._super();
            alert('success init');
        }
    });
});

