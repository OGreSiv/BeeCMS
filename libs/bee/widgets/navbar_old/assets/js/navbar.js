/**
 * Created by Serg on 22.08.2016.
 */

/**
 *
 * @type {
 * {
 *      topOffset: number,              offset from the top
 *      bottomOffset: number,           offset from the buttom
 *      mobileWidth: number,            mobile device width
 *      classInner: string,             the inner main class menu container
 *      classFixed: string,             class for fixation menu
 *      classBottom: string,            class for fixation on the bottom on the screen
 *      menuId: null,                   Tag id for menu
 *      contentId: null,                Tag id for content
 *
 *      _menuHeight: null,
 *      _contentHeight: null,
 *      _scrollBodyHeight: null,
 *      _menuOffsetHeight: null,
 *      _isBottom: boolean,
 *
 *      initialize: Function,
 *      menuFixUnfix: Function,
 *      windowResizing: Function,
 *      windowScroller: Function,
 *      scrollingOffsets: Function,
 *      calculateBoxSize: Function,
 *      setUpListeners: Function,
 *      getMenuHeight: Function,
 *      getContentHeight: Function,
 *      getMenuOffsetHeight: Function,
 *      getScrollBodyHeight: Function
 *  }
 * }
 */
var menuScrollBox = {
    topOffset: 63, // offset from the top
    bottomOffset: 50, // offset from the buttom
    mobileWidth: 481, // mobile device width

    classInner: 'inner-box', // the inner main class menu container
    classFixed: 'fixed', // class for fixation menu. It class need to contain "position: fixed !important;"
    classBottom: 'bottom-offset', // class for fixation on the bottom on the screen. It class need to contain "position: fixed !important; bottom: 0;"

    menuId: null, // Tag id for menu
    contentId: null, //Tag id for content

    _menuHeight: null, // menu height
    _menuLessHeight: null,
    _contentHeight: null, // content height
    _scrollBodyHeight: null, // body height
    _subMenuHeight: 0, // Sub menu Height
    _subMenuObj: null,

    _isMenuLess: true,
    _isBottom: false, // The boolean flag. Showing when user is scrolling down to the bottom and fixed the menu in bottom. Or detach it to scroll up.
    _isSubMenuOpen: false,


    initialize: function (config) {
        //Apply user config
        this.topOffset = config.topOffset ? config.topOffset : this.topOffset;
        this.bottomOffset = config.bottomOffset ? config.bottomOffset : this.bottomOffset;
        this.mobileWidth = config.mobileWidth ? config.mobileWidth : this.mobileWidth;

        this.classInner = config.classInner ? config.classInner : this.classInner;
        this.classFixed = config.classFixed ? config.classFixed : this.classFixed;
        this.classBottom = config.classBottom ? config.classBottom : this.classBottom;

        this.menuId = $(config.menuId);
        this.contentId = $(config.contentId);

        // Setting up listeners
        this.setUpListeners();

        // Calculate tags size
        this.calculateBoxSize();
        this._menuLessHeight = this._menuHeight;

        // Set position as fixed or for scrolling
        this.isMenuScrollOrFix();
    },

    /*
     The calculation of the default sizes in current screen
     And calculation of the scroll body height in current screen
     */
    calculateBoxSize: function() {
        this.getContentHeight();
        this.getMenuHeight();
        this.getScrollBodyHeight();
    },

    /*
     Fixation the menu when menu is less than screen of user window with all offsets
     else - remove fixation and doing scroll
     */
    isMenuScrollOrFix: function(menuHeight) {
        var _menuHeight = menuHeight ? menuHeight : this.getMenuHeight();

        // Remove all styles applied show/hide animations
        var attr = this.menuId.attr("style");
        if (typeof attr !== typeof undefined && attr !== false) {
            this.menuId.removeAttr("style");
        }

        if(this._scrollBodyHeight >= _menuHeight) {
            this.menuId.removeClass(this.classBottom);
            this.menuId.addClass(this.classFixed);
        } else {
            this.menuId.removeClass(this.classFixed);

            if (
                this.getWindowOffsetHeight() >= _menuHeight &&
                this._contentHeight > _menuHeight
            ) {
                this.menuId.addClass(this.classBottom);
            } else {
                this.menuId.removeClass(this.classBottom);
            }
        }
    },

    windowResizing: function(){
        // Close menu if screen is becoming a desktop from mobile with open menu
        this.menuId.removeClass('in');

        this.calculateBoxSize();
        this.isMenuScrollOrFix();
    },

    windowScroller: function(){
        this.isMenuScrollOrFix();
    },

    clickMenuLinks: function(e) {
        this._subMenuObj = $(e.currentTarget).parent().children().last();

        if (this._subMenuObj.is(":visible") === false) {
            this._subMenuHeight = $(e.currentTarget).parent().children().last().height();
            this._menuHeight = this._menuLessHeight + this._subMenuHeight;
            this._isSubMenuOpen = true;
        } else {
            this._subMenuHeight = 0;
            this._menuHeight = this._menuLessHeight;
            this._isSubMenuOpen = false;
        }

        this.isMenuScrollOrFix(this._menuHeight);
    },

    setUpListeners: function () {
        $(window).on('resize', $.proxy(this.windowResizing, this));
        $(window).on('scroll', $.proxy(this.windowScroller, this));
        $("#" + this.menuId.attr("id") + " a[href$='#']").on('click', $.proxy(this.clickMenuLinks, this));
    },

    getMenuHeight: function() {
        return this._menuHeight = this.menuId.find('.' + this.classInner).height();
    },

    getContentHeight: function() {
        return this._contentHeight = this.contentId.height();
    },

    getScrollBodyHeight: function() {
        return this._scrollBodyHeight = $(window).height() - this.topOffset - this.bottomOffset;
    },

    getWindowOffsetHeight: function() {
        return $(window).height() + window.pageYOffset - this.topOffset - this.bottomOffset;
    }
};

$(document).ready(function() {
    /**
     * SCROLLING MENU
     */
    menuScrollBox.initialize({
        menuId: '#leftmenu-collapse',
        contentId: '.content'
    });
});