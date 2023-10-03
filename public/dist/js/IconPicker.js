/**
 * Minified by jsDelivr using Terser v5.3.5.
 * Original file: /npm/@furcan/iconpicker@1.5.0/dist/iconpicker-1.5.0.js
 *
 * Do NOT use SRI with dynamically generated files! More information: https://www.jsdelivr.com/using-sri-with-dynamic-files
 */
/*!
* IconPicker ('https://github.com/furcan/IconPicker')
* Version: 1.5.0
* Author: Furkan MT ('https://github.com/furcan')
* Dependencies: Font Awesome Free v5.11.2 (https://fontawesome.com/license/free)
* Copyright 2019 IconPicker, MIT Licence ('https://opensource.org/licenses/MIT')*
*/
"use strict";
var ipNewOptions, ipDefaultOptions = {
    jsonUrl: null,
    searchPlaceholder: "Search Icon",
    showAllButton: "Show All",
    cancelButton: "Cancel",
    noResultsFound: "No results found.",
    borderRadius: "20px"
}, ipGithubUrl = "https://github.com/furcan/IconPicker", extendIconPicker = function () {
    var e = {}, t = !1, n = 0;
    "[object Boolean]" === Object.prototype.toString.call(arguments[0]) && (t = arguments[0], n++);
    for (var i = function (n) {
        for (var i in n) n.hasOwnProperty(i) && (t && "[object Object]" === Object.prototype.toString.call(n[i]) ? e[i] = extendIconPicker(e[i], n[i]) : e[i] = n[i])
    }; n < arguments.length; n++) i(arguments[n]);
    return e
}, IconPicker = {
    Init: function (e) {
        ipNewOptions = extendIconPicker(!0, ipDefaultOptions, e)
    }, Run: function (e, t) {
        var n = function (e) {
            return console.error("%c IconPicker (Error) ", "padding:2px;border-radius:20px;color:#fff;background:#f44336", "\n" + e)
        }, i = function (e) {
            return console.log("%c IconPicker (Info) ", "padding:2px;border-radius:20px;color:#fff;background:#00bcd4", "\n" + e)
        };
        if (!(arguments && arguments.length <= 2)) return arguments && arguments.length > 2 ? (n("More parameters than allowed."), !1) : (n("You have to call the IconPicker with an Element(Button or etc.) Class or ID. \n\nYou can also find the other required data attributes in the Documentation. \n\nVisit: " + ipGithubUrl), !1);
        var o = document.querySelectorAll(e);
        if (o && o.length > 0) for (var a = 0; a < o.length; a++) {
            var r = o[a];
            r.addEventListener("click", (function () {
                var e = ipNewOptions.jsonUrl, o = this.dataset.iconpickerInput, a = this.dataset.iconpickerPreview,
                    r = ipNewOptions.showAllButton;
                (!r || r && r.length < 1) && (r = ipDefaultOptions.showAllButton);
                var c = ipNewOptions.cancelButton;
                (!c || c && c.length < 1) && (c = ipDefaultOptions.cancelButton);
                var l = ipNewOptions.searchPlaceholder;
                (!l || l && l.length < 1) && (l = ipDefaultOptions.searchPlaceholder);
                var d = ipNewOptions.borderRadius;
                return (!d || d && d.length < 1) && (d = ipDefaultOptions.borderRadius), e ? document.querySelectorAll(o).length <= 0 ? (n('You must define your Input element with it\'s ID or Class Name to your Button element data attribute. \n\nExample: \ndata-iconpicker-input="#MyIconInput" or \ndata-iconpicker-input=".my-icon-input" \n\nVisit to learn how: ' + ipGithubUrl), !1) : (document.querySelectorAll(a).length <= 0 && i('You can define your Preview Icon element with it\'s ID or Class Name to your Button element data attribute. \n\nExample: \ndata-iconpicker-preview="i#MyIconElement" or \ndata-iconpicker-preview="i.my-icon-element" \n\nVisit to learn how: ' + ipGithubUrl), t || "function" == typeof t || (t = void 0), void s(e, r, c, l, d, o, a, t)) : (n('You have to set the path of IconPicker JSON file to "jsonUrl" option. \n\nVisit to learn how: ' + ipGithubUrl), !1)
            }))
        } else n('You called the IconPicker with "' + e + '" selector, but there is no such element on the document.');
        var s = function (e, t, o, a, r, s, l, d) {
            if (navigator.userAgent.toLowerCase().indexOf("chrome") > -1 && window.location.protocol.indexOf("http") <= -1) return i("Chrome Browser blocked this request by CORS policy."), !1;
            if (!document.getElementById("IconPickerModal")) {
                var u = new XMLHttpRequest;
                u.open("GET", e, !0), u.setRequestHeader("Content-type", "application/json; charset=utf-8"), u.send(), u.onreadystatechange = function () {
                    if (4 === this.readyState) if (200 === this.status) {
                        var e = this.responseText;
                        c(e, t, o, a, r, s, l, d)
                    } else n("XMLHttpRequest Failed.")
                }
            }
        }, c = function (e, t, n, i, o, a, r, s) {
            var c = JSON.parse(e), l = "";
            for (var d in c) if (c.hasOwnProperty(d)) {
                var u = c[d];
                l += '<i data-search="' + u + '" data-class="' + u + '" class="first-icon select-icon ' + u + '"></i>'
            }
            var p = '<div class="ip-icons-content" style="border-radius:' + o + ';"><div class="ip-icons-search"><input id="IconPickerSearch" type="text" spellcheck="false" autocomplete="off" placeholder="' + i + '" style="border-radius:' + o + ';" /><i class="placeholder-icon fas fa-search"></i></div><div class="ip-icons-search-results"></div><div class="ip-icons-area"><div id="IconPickerLoading"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60" height="60" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="translate(25 50)"><circle cx="0" cy="0" r="9" fill="#1e1e1e" transform="scale(0.24 0.24)"><animateTransform attributeName="transform" type="scale" begin="-0.2666s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"/></circle></g><g transform="translate(50 50)"><circle cx="0" cy="0" r="9" fill="#1e1e1e" transform="scale(0.00153 0.00153)"><animateTransform attributeName="transform" type="scale" begin="-0.1333s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"/></circle></g><g transform="translate(75 50)"><circle cx="0" cy="0" r="9" fill="#1e1e1e" transform="scale(0.3 0.3)"><animateTransform attributeName="transform" type="scale" begin="0s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"/></circle></g></svg></div>' + l + '<a class="ip-show-all-icons" style="border-radius:' + o + ';">' + t + '</a></div><div class="ip-icons-footer"><a class="cancel" style="border-radius:' + o + ';">' + n + "</a></div></div>",
                h = document.createElement("div");
            h.id = "IconPickerModal", h.innerHTML = p;
            var m = document.body;
            m.appendChild(h);
            var f = document.getElementById(h.id);
            f.style.display = "block";
            var v = parseInt(f.offsetHeight), g = parseInt(window.innerHeight),
                y = parseInt(window.pageYOffset || document.documentElement.scrollTop), w = y + (g - v) / 2;
            g + 20 <= v && (w = y), f.style.top = w + "px", f.classList.add("animate");
            var k = document.getElementById("IconPickerLoading"), I = setTimeout((function () {
                k.classList.add("hide"), clearTimeout(I)
            }), 600), b = setTimeout((function () {
                k.parentNode.removeChild(k), clearTimeout(b)
            }), 900);
            document.getElementById(h.id).getElementsByClassName("ip-show-all-icons")[0].addEventListener("click", (function () {
                f.classList.add("show-all"), this.parentNode.removeChild(this)
            }), !1);
            var E = function (e) {
                f.classList.remove("animate"), setTimeout((function () {
                    m.removeChild(f)
                }), e)
            };
            document.getElementById(h.id).getElementsByClassName("cancel")[0].addEventListener("click", (function () {
                E(400)
            }), !1), document.getElementById("IconPickerSearch").addEventListener("keyup", (function (e) {
                var t = e.keyCode, n = e.code.toString().toLowerCase(), i = !1;
                if (32 !== t && "space" !== n && 8 !== t && "backspace" !== n || (i = !0), 32 === t || "space" === n) return this.value = this.value.replace(" ", ""), !1;
                var o = this.value.toString().toLowerCase(),
                    a = document.getElementById(h.id).getElementsByClassName("ip-icons-area")[0],
                    r = document.getElementById(h.id).getElementsByClassName("ip-icons-search-results")[0];
                if (r.innerHTML = "", !i && o.length > 0) {
                    var s = "";
                    for (var l in c) if (c.hasOwnProperty(l)) {
                        var d = c[l];
                        if (d.toString().indexOf(o) > -1) a.style.display = "none", s += '<i data-search="' + d + '" data-class="' + d + '" class="search-icon select-icon ' + d + '"></i>'
                    }
                    var u = document.createElement("div");
                    if (u.id = "IconsTempResults", u.innerHTML = s, s.length < 1) {
                        a.style.display = "none";
                        var p = ipNewOptions.noResultsFound;
                        (!p || p && p.length < 1) && (p = ipDefaultOptions.noResultsFound);
                        var m = '<p class="ip-no-results-found">' + p + "</p>";
                        u.innerHTML = m
                    }
                    r.appendChild(u), B("search")
                } else a.style.display = "block"
            }), !1);
            var B = function (e) {
                var t, n = document.querySelectorAll(a), i = document.querySelectorAll(r);
                "first" === e ? t = document.getElementById(h.id).getElementsByClassName("first-icon") : "search" === e && (t = document.getElementById(h.id).getElementsByClassName("search-icon"));
                for (var o = 0; o < t.length; o++) {
                    t[o].addEventListener("click", (function (e) {
                        e.preventDefault();
                        for (var t = this.dataset.class, o = 0; o < n.length; o++) {
                            var a = n[o].tagName.toString().toLowerCase();
                            "input" === a || "textarea" === a ? n[o].value = t : n[o].innerHTML = t
                        }
                        for (o = 0; o < i.length; o++) i[o].className = t;
                        s && s(), E(400)
                    }), !1)
                }
            };
            B("first")
        }
    }
};
