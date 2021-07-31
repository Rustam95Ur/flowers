function numberWithSpaces(n) {
    var t = n.toString().split(".");
    return t[0] = t[0].replace(/\B(?=(\d{3})+(?!\d))/g, " "), t.join(",")
}

function fnPrototypeToFormatted(n, t, i) {
    var u, f, r;
    return isNaN(u = (isNaN(n) ? n.replace(/,/, ".") : n) * 1) ? "" : isFinite(u) ? (f = t && Math.ceil(Math.round(u * 100)) / 100 || Math.floor(Math.round(u * 100)) / 100, i && (f = parseInt(f)), r = (f + "").replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g, "$1 ").replace(".", ","), r.indexOf(",") !== -1 && r.indexOf(",") > r.length - 3 && (r += "0"), r) : "0"
}

function getDeviceType() {
    deviceType = document.body.classList.contains("body--mobile") ? "Mobile" : "Desktop"
}

function animateKaspiPreloaderSvg(n) {
    var t;
    if (!(t = n.find(".kaspiPreloader__svg")).length) return !1;
    t.css("animation", "none").animate({borderSpacing: 360}, {
        step: function (n) {
            $(this).css("-webkit-transform", "rotate(" + n + "deg)");
            $(this).css("-moz-transform", "rotate(" + n + "deg)");
            $(this).css("transform", "rotate(" + n + "deg)")
        }, easing: "linear", duration: 3e3, complete: function () {
            t.css({borderSpacing: 0});
            animateKaspiPreloaderSvg(n)
        }
    })
}

function animateKaspiPreloaderCircle(n) {
    var t = 1, r = (t + 314.9) / 85, u = 0, i;
    if (!(i = n.find(".kaspiPreloader__circle")).length) return !1;
    i.css({
        animation: "none",
        "stroke-dasharray": t + ", 552",
        "stroke-dashoffset": 0
    }).animate({"stroke-dashoffset": -117.3}, {
        step: function () {
            u++;
            $(this).css({"stroke-dasharray": (t += r) + ", 552"})
        }, easing: "linear", duration: 1150, complete: function () {
            i.animate({"stroke-dashoffset": -417.4}, {
                easing: "linear", duration: 1150, complete: function () {
                    animateKaspiPreloaderCircle(n)
                }
            })
        }
    })
}

function calculateCircleRadius() {
    var n = $(".kaspiPreloader__svg").width() / 2;
    $(".kaspiPreloader__svg circle").attr("cx", n);
    $(".kaspiPreloader__svg circle").attr("cy", n);
    $(".kaspiPreloader__svg circle").attr("r", n - 2)
}

var adaptVersionMaxWidth, sendAppLinkHelper, kaspiMenuClass, logoutPopupHelper, registerClientContact, deviceType,
    kaspiAntsHelper, failureMessageHelper, commonAlertHelper, commonAlert, commonModalHelper, commonModal;
(function (n) {
    typeof define == "function" && define.amd ? define(["jquery"], n) : typeof exports == "object" ? module.exports = n(require("jquery")) : n(jQuery)
})(function (n) {
    function i(n) {
        return t.raw ? n : encodeURIComponent(n)
    }

    function f(n) {
        return t.raw ? n : decodeURIComponent(n)
    }

    function e(n) {
        return i(t.json ? JSON.stringify(n) : String(n))
    }

    function o(n) {
        n.indexOf('"') === 0 && (n = n.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, "\\"));
        try {
            return n = decodeURIComponent(n.replace(u, " ")), t.json ? JSON.parse(n) : n
        } catch (i) {
        }
    }

    function r(i, r) {
        var u = t.raw ? i : o(i);
        return n.isFunction(r) ? r(u) : u
    }

    var u = /\+/g, t = n.cookie = function (u, o, s) {
        var v, c;
        if (arguments.length > 1 && !n.isFunction(o)) return s = n.extend({}, t.defaults, s), typeof s.expires == "number" && (v = s.expires, c = s.expires = new Date, c.setMilliseconds(c.getMilliseconds() + v * 864e5)), document.cookie = [i(u), "=", e(o), s.expires ? "; expires=" + s.expires.toUTCString() : "", s.path ? "; path=" + s.path : "", s.domain ? "; domain=" + s.domain : "", s.secure ? "; secure" : ""].join("");
        for (var l = u ? undefined : {}, y = document.cookie ? document.cookie.split("; ") : [], a = 0, b = y.length; a < b; a++) {
            var p = y[a].split("="), w = f(p.shift()), h = p.join("=");
            if (u === w) {
                l = r(h, o);
                break
            }
            u || (h = r(h)) === undefined || (l[w] = h)
        }
        return l
    };
    t.defaults = {};
    n.removeCookie = function (t, i) {
        return n.cookie(t, "", n.extend({}, i, {expires: -1})), !n.cookie(t)
    }
});
!function (n) {
    "function" == typeof define && define.amd ? define(["./dependencyLibs/inputmask.dependencyLib", "./global/window", "./global/document"], n) : "object" == typeof exports ? module.exports = n(require("./dependencyLibs/inputmask.dependencyLib"), require("./global/window"), require("./global/document")) : window.Inputmask = n(window.dependencyLib || jQuery, window, document)
}(function (n, t, i, r) {
    function u(t, i, f) {
        if (!(this instanceof u)) return new u(t, i, f);
        this.el = r;
        this.events = {};
        this.maskset = r;
        this.refreshValue = !1;
        !0 !== f && (n.isPlainObject(t) ? i = t : (i = i || {}, i.alias = t), this.opts = n.extend(!0, {}, this.defaults, i), this.noMasksCache = i && i.definitions !== r, this.userOptions = i || {}, this.isRTL = this.opts.numericInput, c(this.opts.alias, i, this.opts))
    }

    function c(t, i, f) {
        var e = u.prototype.aliases[t];
        return e ? (e.alias && c(e.alias, r, f), n.extend(!0, f, e), n.extend(!0, f, i), !0) : (null === f.mask && (f.mask = t), !1)
    }

    function e(t, i) {
        function e(t, f, e) {
            var h = !1, c, o, s;
            return (null !== t && "" !== t || (h = null !== e.regex, h ? (t = e.regex, t = t.replace(/^(\^)(.*)(\$)$/, "$2")) : t = "*{*}"), 1 === t.length && !1 === e.greedy && 0 !== e.repeat && (e.placeholder = ""), e.repeat > 0 || "*" === e.repeat || "+" === e.repeat) && (c = "*" === e.repeat ? 0 : "+" === e.repeat ? 1 : e.repeat, t = e.groupmarker.start + t + e.groupmarker.end + e.quantifiermarker.start + c + "," + e.repeat + e.quantifiermarker.end), s = h ? "regex_" + e.regex : e.numericInput ? t.split("").reverse().join("") : t, u.prototype.masksCache[s] === r || !0 === i ? (o = {
                mask: t,
                maskToken: u.prototype.analyseMask(t, h, e),
                validPositions: {},
                _buffer: r,
                buffer: r,
                tests: {},
                metadata: f,
                maskLength: r
            }, !0 !== i && (u.prototype.masksCache[s] = o, o = n.extend(!0, {}, u.prototype.masksCache[s]))) : o = n.extend(!0, {}, u.prototype.masksCache[s]), o
        }

        if (n.isFunction(t.mask) && (t.mask = t.mask(t)), n.isArray(t.mask)) {
            if (t.mask.length > 1) {
                t.keepStatic = null === t.keepStatic || t.keepStatic;
                var f = t.groupmarker.start;
                return n.each(t.numericInput ? t.mask.reverse() : t.mask, function (i, u) {
                    f.length > 1 && (f += t.groupmarker.end + t.alternatormarker + t.groupmarker.start);
                    f += u.mask === r || n.isFunction(u.mask) ? u : u.mask
                }), f += t.groupmarker.end, e(f, t.mask, t)
            }
            t.mask = t.mask.pop()
        }
        return t.mask && t.mask.mask !== r && !n.isFunction(t.mask.mask) ? e(t.mask.mask, t.mask, t) : e(t.mask, t.mask, t)
    }

    function f(e, s, c) {
        function bt(n, t, i) {
            t = t || 0;
            var s, f, e, o = [], u = 0, h = w();
            -1 === (pt = y !== r ? y.maxLength : r) && (pt = r);
            do !0 === n && v().validPositions[u] ? (e = v().validPositions[u], f = e.match, s = e.locator.slice(), o.push(!0 === i ? e.input : !1 === i ? f.nativeDef : tt(u, f))) : (e = ct(u, s, u - 1), f = e.match, s = e.locator.slice(), (!1 === c.jitMasking || u < h || "number" == typeof c.jitMasking && isFinite(c.jitMasking) && c.jitMasking > u) && o.push(!1 === i ? f.nativeDef : tt(u, f))), u++; while ((pt === r || u < pt) && (null !== f.fn || "" !== f.def) || t > u);
            return "" === o[o.length - 1] && o.pop(), v().maskLength = u + 1, o
        }

        function v() {
            return s
        }

        function it(n) {
            var t = v();
            t.buffer = r;
            !0 !== n && (t.validPositions = {}, t.p = 0)
        }

        function w(n, t, i) {
            var f = -1, e = -1, o = i || v().validPositions, s, u;
            n === r && (n = -1);
            for (s in o) u = parseInt(s), o[u] && (t || !0 !== o[u].generatedInput) && (u <= n && (f = u), u >= n && (e = u));
            return -1 !== f && n - f > 1 || e < n ? f : e
        }

        function ai(t, i, u, f) {
            var e, o = t, h = n.extend(!0, {}, v().validPositions), l = !1, s;
            for (v().p = t, e = i - 1; e >= o; e--) v().validPositions[e] !== r && (!0 !== u && (!v().validPositions[e].match.optionality && function (n) {
                var t = v().validPositions[n], i, u;
                return t !== r && null === t.match.fn ? (i = v().validPositions[n - 1], u = v().validPositions[n + 1], i !== r && u !== r) : !1
            }(e) || !1 === c.canClearPosition(v(), e, w(), f, c)) || delete v().validPositions[e]);
            for (it(!0), e = o + 1; e <= w();) {
                for (; v().validPositions[o] !== r;) o++;
                (e < o && (e = o + 1), v().validPositions[e] === r && ut(e)) ? e++ : (s = ct(e), !1 === l && h[o] && h[o].match.def === s.match.def ? (v().validPositions[o] = n.extend(!0, {}, h[o]), v().validPositions[o].input = s.input, delete v().validPositions[e], e++) : vi(o, s.match.def) ? !1 !== at(o, s.input || tt(e), !0) && (delete v().validPositions[e], e++, l = !0) : ut(e) || (e++, o--), o++)
            }
            it(!0)
        }

        function kt(n, t) {
            for (var i, e = n, o = w(), u = v().validPositions[o] || et(0)[0], s = u.alternation !== r ? u.locator[u.alternation].toString().split(",") : [], f = 0; f < e.length && (i = e[f], !(i.match && (c.greedy && !0 !== i.match.optionalQuantifier || (!1 === i.match.optionality || !1 === i.match.newBlockMarker) && !0 !== i.match.optionalQuantifier) && (u.alternation === r || u.alternation !== i.alternation || i.locator[u.alternation] !== r && fi(i.locator[u.alternation].toString().split(","), s))) || !0 === t && (null !== i.match.fn || /[0-9a-bA-Z]/.test(i.match.def))); f++) ;
            return i
        }

        function ct(n, t, i) {
            return v().validPositions[n] || kt(et(n, t ? t.slice() : t, i))
        }

        function lt(n) {
            return v().validPositions[n] ? v().validPositions[n] : et(n)[0]
        }

        function vi(n, t) {
            for (var u = !1, r = et(n), i = 0; i < r.length; i++) if (r[i].match && r[i].match.def === t) {
                u = !0;
                break
            }
            return u
        }

        function et(t, i, u) {
            function p(i, u, o, h) {
                function l(o, h, w) {
                    function lt(t, i) {
                        var r = 0 === n.inArray(t, i.matches);
                        return r || n.each(i.matches, function (n, u) {
                            if (!0 === u.isQuantifier && (r = lt(t, i.matches[n - 1]))) return !1
                        }), r
                    }

                    function vt(t, i, u) {
                        var f, o;
                        if (v().validPositions[t - 1] && u && v().tests[t]) for (var s = v().validPositions[t - 1].locator, h = v().tests[t][0].locator, e = 0; e < u; e++) if (s[e] !== h[e]) return s.slice(u + 1);
                        return (v().tests[t] || v().validPositions[t]) && n.each(v().tests[t] || [v().validPositions[t]], function (n, t) {
                            var s = u !== r ? u : t.alternation,
                                e = t.locator[s] !== r ? t.locator[s].toString().indexOf(i) : -1;
                            (o === r || e < o) && -1 !== e && (f = t, o = e)
                        }), f ? f.locator.slice((u !== r ? u : f.alternation) + 1) : u !== r ? vt(t, i) : r
                    }

                    var yt, ot, ut, st, b, ft, ht, k, rt, it, ct;
                    if (e > 1e4) throw"Inputmask: There is probably an error in your mask definition or in the code. Create an issue on github with an example of the mask you are using. " + v().mask;
                    if (e === t && o.matches === r) return f.push({match: o, locator: h.reverse(), cd: y}), !0;
                    if (o.matches !== r) {
                        if (o.isGroup && w !== o) {
                            if (o = l(i.matches[n.inArray(o, i.matches) + 1], h)) return !0
                        } else if (o.isOptional) {
                            if (yt = o, o = p(o, u, h, w)) {
                                if (s = f[f.length - 1].match, !lt(s, yt)) return !0;
                                a = !0;
                                e = t
                            }
                        } else if (o.isAlternator) {
                            var at, et = o, d = [], bt = f.slice(), pt = h.length, g = u.length > 0 ? u.shift() : -1;
                            if (-1 === g || "string" == typeof g) {
                                var nt, kt = e, wt = u.slice(), tt = [];
                                if ("string" == typeof g) tt = g.split(","); else for (nt = 0; nt < et.matches.length; nt++) tt.push(nt);
                                for (ot = 0; ot < tt.length; ot++) for ((nt = parseInt(tt[ot]), f = [], u = vt(e, nt, pt) || wt.slice(), !0 !== (o = l(et.matches[nt] || i.matches[nt], [nt].concat(h), w) || o) && o !== r && tt[tt.length - 1] < et.matches.length) && (ut = n.inArray(o, i.matches) + 1, i.matches.length > ut && (o = l(i.matches[ut], [ut].concat(h.slice(1, h.length)), w)) && (tt.push(ut.toString()), n.each(f, function (n, t) {
                                    t.alternation = h.length - 1
                                }))), at = f.slice(), e = kt, f = [], st = 0; st < at.length; st++) {
                                    for (b = at[st], ft = !1, b.alternation = b.alternation || pt, ht = 0; ht < d.length; ht++) if (k = d[ht], "string" != typeof g || -1 !== n.inArray(b.locator[b.alternation].toString(), tt)) {
                                        if (function (n, t) {
                                            return n.match.nativeDef === t.match.nativeDef || n.match.def === t.match.nativeDef || n.match.nativeDef === t.match.def
                                        }(b, k)) {
                                            ft = !0;
                                            b.alternation == k.alternation && -1 === k.locator[k.alternation].toString().indexOf(b.locator[b.alternation]) && (k.locator[k.alternation] = k.locator[k.alternation] + "," + b.locator[b.alternation], k.alternation = b.alternation);
                                            b.match.nativeDef === k.match.def && (b.locator[b.alternation] = k.locator[k.alternation], d.splice(d.indexOf(k), 1, b));
                                            break
                                        }
                                        if (b.match.def === k.match.def) {
                                            ft = !1;
                                            break
                                        }
                                        if (function (n, i) {
                                            return null === n.match.fn && null !== i.match.fn && i.match.fn.test(n.match.def, v(), t, !1, c, !1)
                                        }(b, k) || function (n, i) {
                                            return null !== n.match.fn && null !== i.match.fn && i.match.fn.test(n.match.def.replace(/[\[\]]/g, ""), v(), t, !1, c, !1)
                                        }(b, k)) {
                                            b.alternation == k.alternation && -1 === b.locator[b.alternation].toString().indexOf(k.locator[k.alternation].toString().split("")[0]) && (b.na = b.na || b.locator[b.alternation].toString(), -1 === b.na.indexOf(b.locator[b.alternation].toString().split("")[0]) && (b.na = b.na + "," + b.locator[k.alternation].toString().split("")[0]), ft = !0, b.locator[b.alternation] = k.locator[k.alternation].toString().split("")[0] + "," + b.locator[b.alternation], d.splice(d.indexOf(k), 0, b));
                                            break
                                        }
                                    }
                                    ft || d.push(b)
                                }
                                "string" == typeof g && (d = n.map(d, function (t, i) {
                                    var u, e, f;
                                    if (isFinite(i)) {
                                        for (u = t.alternation, e = t.locator[u].toString().split(","), t.locator[u] = r, t.alternation = r, f = 0; f < e.length; f++) -1 !== n.inArray(e[f], tt) && (t.locator[u] !== r ? (t.locator[u] += ",", t.locator[u] += e[f]) : t.locator[u] = parseInt(e[f]), t.alternation = u);
                                        if (t.locator[u] !== r) return t
                                    }
                                }));
                                f = bt.concat(d);
                                e = t;
                                a = f.length > 0;
                                o = d.length > 0;
                                u = wt.slice()
                            } else o = l(et.matches[g] || i.matches[g], [g].concat(h), w);
                            if (o) return !0
                        } else if (o.isQuantifier && w !== i.matches[n.inArray(o, i.matches) - 1]) {
                            for (rt = o, it = u.length > 0 ? u.shift() : 0; it < (isNaN(rt.quantifier.max) ? it + 1 : rt.quantifier.max) && e <= t; it++) if (ct = i.matches[n.inArray(rt, i.matches) - 1], o = l(ct, [it].concat(h), ct)) {
                                if (s = f[f.length - 1].match, s.optionalQuantifier = it > rt.quantifier.min - 1, lt(s, ct)) {
                                    if (it > rt.quantifier.min - 1) {
                                        a = !0;
                                        e = t;
                                        break
                                    }
                                    return !0
                                }
                                return !0
                            }
                        } else if (o = p(o, u, h, w)) return !0
                    } else e++
                }

                for (var b, w = u.length > 0 ? u.shift() : 0; w < i.matches.length; w++) if (!0 !== i.matches[w].isQuantifier) {
                    if (b = l(i.matches[w], [w].concat(o), h), b && e === t) return b;
                    if (e > t) break
                }
            }

            function w(n) {
                return c.keepStatic && t > 0 && n.length > 1 + ("" === n[n.length - 1].match.def ? 1 : 0) && !0 !== n[0].match.optionality && !0 !== n[0].match.optionalQuantifier && null === n[0].match.fn && !/[0-9a-bA-Z]/.test(n[0].match.def) ? [kt(n)] : n
            }

            var s, k = v().maskToken, e = i ? u : 0, l = i ? i.slice() : [0], f = [], a = !1, y = i ? i.join("") : "",
                b, o, h;
            if (t > -1) {
                if (i === r) {
                    for (o = t - 1; (b = v().validPositions[o] || v().tests[o]) === r && o > -1;) o--;
                    b !== r && o > -1 && (l = function (t) {
                        var i = [];
                        return n.isArray(t) || (t = [t]), t.length > 0 && (t[0].alternation === r ? (i = kt(t.slice()).locator.slice(), 0 === i.length && (i = t[0].locator.slice())) : n.each(t, function (n, t) {
                            if ("" !== t.def) if (0 === i.length) i = t.locator.slice(); else for (var r = 0; r < i.length; r++) t.locator[r] && -1 === i[r].toString().indexOf(t.locator[r]) && (i[r] += "," + t.locator[r])
                        })), i
                    }(b), y = l.join(""), e = o)
                }
                if (v().tests[t] && v().tests[t][0].cd === y) return w(v().tests[t]);
                for (h = l.shift(); h < k.length; h++) if (p(k[h], l, [h]) && e === t || e > t) break
            }
            return (0 === f.length || a) && f.push({
                match: {
                    fn: null,
                    cardinality: 0,
                    optionality: !0,
                    casing: null,
                    def: "",
                    placeholder: ""
                }, locator: [], cd: y
            }), i !== r && v().tests[t] ? w(n.extend(!0, [], f)) : (v().tests[t] = n.extend(!0, [], f), w(v().tests[t]))
        }

        function rt() {
            return v()._buffer === r && (v()._buffer = bt(!1, 1), v().buffer === r && (v().buffer = v()._buffer.slice())), v()._buffer
        }

        function p(n) {
            return v().buffer !== r && !0 !== n || (v().buffer = bt(!0, w(), !0)), v().buffer
        }

        function dt(n, t, i) {
            var u, e, f;
            if (!0 === n) it(), n = 0, t = i.length; else for (u = n; u < t; u++) delete v().validPositions[u];
            for (e = n, u = n; u < t; u++) (it(!0), i[u] !== c.skipOptionalPartCharacter) && (f = at(e, i[u], !0, !0), !1 !== f && (it(!0), e = f.caret !== r ? f.caret : f.pos + 1))
        }

        function bi(t, i, r) {
            var f, e;
            switch (c.casing || i.casing) {
                case"upper":
                    t = t.toUpperCase();
                    break;
                case"lower":
                    t = t.toLowerCase();
                    break;
                case"title":
                    f = v().validPositions[r - 1];
                    t = 0 === r || f && f.input === String.fromCharCode(u.keyCode.SPACE) ? t.toUpperCase() : t.toLowerCase();
                    break;
                default:
                    n.isFunction(c.casing) && (e = arguments.push(v().validPositions), t = c.casing.apply(this, e))
            }
            return t
        }

        function fi(t, i, u) {
            for (var f, o, l = c.greedy ? i : i.slice(0, 1), s = !1, h = u !== r ? u.split(",") : [], e = 0; e < h.length; e++) -1 !== (o = t.indexOf(h[e])) && t.splice(o, 1);
            for (f = 0; f < t.length; f++) if (-1 !== n.inArray(t[f], l)) {
                s = !0;
                break
            }
            return s
        }

        function at(t, i, f, e, o) {
            function y(n) {
                var t = g ? n.begin - n.end > 1 || n.begin - n.end == 1 : n.end - n.begin > 1 || n.end - n.begin == 1;
                return t && 0 === n.begin && n.end === v().maskLength ? "full" : t
            }

            function k(i, u, f) {
                var o = !1;
                return n.each(et(i), function (s, h) {
                    for (var b, a, nt, k, l = h.match, ut = u ? 1 : 0, d = "", g = l.cardinality; g > ut; g--) d += ki(i - (g - 1));
                    if (u && (d += u), p(!0), !1 !== (o = null != l.fn ? l.fn.test(d, v(), i, f, c, y(t)) : (u === l.def || u === c.skipOptionalPartCharacter) && "" !== l.def && {
                        c: tt(i, l, !0) || l.def,
                        pos: i
                    })) {
                        if (b = o.c !== r ? o.c : u, b = b === c.skipOptionalPartCharacter && null === l.fn ? tt(i, l, !0) || l.def : b, a = i, nt = p(), o.remove !== r && (n.isArray(o.remove) || (o.remove = [o.remove]), n.each(o.remove.sort(function (n, t) {
                            return t - n
                        }), function (n, t) {
                            ai(t, t + 1, !0)
                        })), o.insert !== r && (n.isArray(o.insert) || (o.insert = [o.insert]), n.each(o.insert.sort(function (n, t) {
                            return n - t
                        }), function (n, t) {
                            at(t.pos, t.c, !0, e)
                        })), o.refreshFromBuffer) {
                            if (k = o.refreshFromBuffer, dt(!0 === k ? k : k.start, k.end, nt), o.pos === r && o.c === r) return o.pos = w(), !1;
                            if ((a = o.pos !== r ? o.pos : i) !== i) return o = n.extend(o, at(a, b, !0, e)), !1
                        } else if (!0 !== o && o.pos !== r && o.pos !== i && (a = o.pos, dt(i, a, p().slice()), a !== i)) return o = n.extend(o, at(a, b, !0)), !1;
                        return (!0 === o || o.pos !== r || o.c !== r) && (s > 0 && it(!0), rt(a, n.extend({}, h, {input: bi(b, l, a)}), e, y(t)) || (o = !1), !1)
                    }
                }), o
            }

            function rt(t, i, u, f) {
                var o, h, p, s, e, y;
                if (f || c.insertMode && v().validPositions[t] !== r && u === r) {
                    for (h = n.extend(!0, {}, v().validPositions), p = w(r, !0), o = t; o <= p; o++) delete v().validPositions[o];
                    v().validPositions[t] = n.extend(!0, {}, i);
                    var a, l = !0, b = v().validPositions, k = !1, d = v().maskLength;
                    for (o = a = t; o <= p; o++) {
                        if (s = h[o], s !== r) for (e = a; e < v().maskLength && (null === s.match.fn && b[o] && (!0 === b[o].match.optionalQuantifier || !0 === b[o].match.optionality) || null != s.match.fn);) {
                            if (e++, !1 === k && h[e] && h[e].match.def === s.match.def) v().validPositions[e] = n.extend(!0, {}, h[e]), v().validPositions[e].input = s.input, ft(e), a = e, l = !0; else if (vi(e, s.match.def)) y = at(e, s.input, !0, !0), l = !1 !== y, a = y.caret || y.insert ? w() : e, k = !0; else if (!(l = !0 === s.generatedInput) && e >= v().maskLength - 1) break;
                            if (v().maskLength < d && (v().maskLength = d), l) break
                        }
                        if (!l) break
                    }
                    if (!l) return v().validPositions = n.extend(!0, {}, h), it(!0), !1
                } else v().validPositions[t] = n.extend(!0, {}, i);
                return it(!0), !0
            }

            function ft(t) {
                for (var u, f, i = t - 1; i > -1 && !v().validPositions[i]; i--) ;
                for (i++; i < t; i++) v().validPositions[i] === r && (!1 === c.jitMasking || c.jitMasking > i) && (f = et(i, ct(i - 1).locator, i - 1).slice(), "" === f[f.length - 1].match.def && f.pop(), (u = kt(f)) && (u.match.def === c.radixPointDefinitionSymbol || !ut(i, !0) || n.inArray(c.radixPoint, p()) < i && u.match.fn && u.match.fn.test(tt(i), v(), i, !1, c)) && !1 !== (s = k(i, tt(i, u.match, !0) || (null == u.match.fn ? u.match.def : "" !== tt(i) ? tt(i) : p()[i]), !0)) && (v().validPositions[s.pos || i].generatedInput = !0))
            }

            var h, s, ot, nt, a, st, l, b;
            if (f = !0 === f, h = t, t.begin !== r && (h = g && !y(t) ? t.end : t.begin), s = !0, ot = n.extend(!0, {}, v().validPositions), n.isFunction(c.preValidation) && !f && !0 !== e && (s = c.preValidation(p(), h, i, y(t), c)), !0 === s) {
                if (ft(h), y(t) && (oi(r, u.keyCode.DELETE, t), h = v().p), h < v().maskLength && (pt === r || h < pt) && (s = k(h, i, f), (!f || !0 === e) && !1 === s)) if (nt = v().validPositions[h], nt && null === nt.match.fn && (nt.match.def === i || i === c.skipOptionalPartCharacter)) s = {caret: d(h)}; else if ((c.insertMode || v().validPositions[d(h)] === r) && !ut(h, !0)) for (a = h + 1, st = d(h); a <= st; a++) if (!1 !== (s = k(a, i, f))) {
                    !function (t, i) {
                        var o = v().validPositions[i];
                        if (o) for (var s = o.locator, c = s.length, f = t; f < i; f++) if (v().validPositions[f] === r && !ut(f, !0)) {
                            var e = et(f).slice(), u = kt(e, !0), h = -1;
                            "" === e[e.length - 1].match.def && e.pop();
                            n.each(e, function (n, t) {
                                for (var i = 0; i < c; i++) {
                                    if (t.locator[i] === r || !fi(t.locator[i].toString().split(","), s[i].toString().split(","), t.na)) {
                                        var f = s[i], e = u.locator[i], o = t.locator[i];
                                        f - e > Math.abs(f - o) && (u = t);
                                        break
                                    }
                                    h < i && (h = i, u = t)
                                }
                            });
                            u = n.extend({}, u, {input: tt(f, u.match, !0) || u.match.def});
                            u.generatedInput = !0;
                            rt(f, u, !0);
                            v().validPositions[i] = r;
                            k(i, o.input, !0)
                        }
                    }(h, s.pos !== r ? s.pos : a);
                    h = a;
                    break
                }
                !1 === s && c.keepStatic && !f && !0 !== o && (s = function (t, i, u) {
                    for (var g, s, y, o, l, a, f, tt = n.extend(!0, {}, v().validPositions), p = !1, k = w(), b, d, nt, h = v().validPositions[k]; k >= 0; k--) if ((y = v().validPositions[k]) && y.alternation !== r) {
                        if (g = k, s = v().validPositions[g].alternation, h.locator[y.alternation] !== y.locator[y.alternation]) break;
                        h = y
                    }
                    return s !== r && (f = parseInt(g), b = h.locator[h.alternation || s] !== r ? h.locator[h.alternation || s] : a[0], b.length > 0 && (b = b.split(",")[0]), d = v().validPositions[f], nt = v().validPositions[f - 1], n.each(et(f, nt ? nt.locator : r, f - 1), function (h, y) {
                        var k, ot, ut, ft;
                        for (a = y.locator[s] ? y.locator[s].toString().split(",") : [], k = 0; k < a.length; k++) {
                            var g = [], rt = 0, nt = 0, et = !1;
                            if (b < a[k] && (y.na === r || -1 === n.inArray(a[k], y.na.split(",")) || -1 === n.inArray(b.toString(), a))) {
                                for (v().validPositions[f] = n.extend(!0, {}, y), ot = v().validPositions[f].locator, v().validPositions[f].locator[s] = parseInt(a[k]), null == y.match.fn ? (d.input !== y.match.def && (et = !0, !0 !== d.generatedInput && g.push(d.input)), nt++, v().validPositions[f].generatedInput = !/[0-9a-bA-Z]/.test(y.match.def), v().validPositions[f].input = y.match.def) : v().validPositions[f].input = d.input, o = f + 1; o < w(r, !0) + 1; o++) l = v().validPositions[o], l && !0 !== l.generatedInput && /[0-9a-bA-Z]/.test(l.input) ? g.push(l.input) : o < t && rt++, delete v().validPositions[o];
                                for (et && g[0] === y.match.def && g.shift(), it(!0), p = !0; g.length > 0;) if (ut = g.shift(), ut !== c.skipOptionalPartCharacter && !(p = at(w(r, !0) + 1, ut, !1, e, !0))) break;
                                if (p) {
                                    for (v().validPositions[f].locator = ot, ft = w(t) + 1, o = f + 1; o < w() + 1; o++) ((l = v().validPositions[o]) === r || null == l.match.fn) && o < t + (nt - rt) && nt++;
                                    t += nt - rt;
                                    p = at(t > ft ? ft : t, i, u, e, !0)
                                }
                                if (p) return !1;
                                it();
                                v().validPositions = n.extend(!0, {}, tt)
                            }
                        }
                    })), p
                }(h, i, f));
                !0 === s && (s = {pos: h})
            }
            return n.isFunction(c.postValidation) && !1 !== s && !f && !0 !== e && (l = c.postValidation(p(!0), s, c), l.refreshFromBuffer && l.buffer && (b = l.refreshFromBuffer, dt(!0 === b ? b : b.start, b.end, l.buffer)), s = !0 === l ? s : l), s.pos === r && (s.pos = h), !1 === s && (it(!0), v().validPositions = n.extend(!0, {}, ot)), s
        }

        function ut(n, t) {
            var i = ct(n).match, r;
            return ("" === i.def && (i = lt(n).match), null != i.fn) ? i.fn : !0 !== t && n > -1 ? (r = et(n), r.length > 1 + ("" === r[r.length - 1].match.def ? 1 : 0)) : !1
        }

        function d(n, t) {
            var i = v().maskLength, r;
            if (n >= i) return i;
            for (r = n, et(i + 1).length > 1 && (bt(!0, i + 1, !0), i = v().maskLength); ++r < i && (!0 === t && (!0 !== lt(r).match.newBlockMarker || !ut(r)) || !0 !== t && !ut(r));) ;
            return r
        }

        function wt(n, t) {
            var r, i = n;
            if (i <= 0) return 0;
            for (; --i > 0 && (!0 === t && !0 !== lt(i).match.newBlockMarker || !0 !== t && !ut(i) && (r = et(i), r.length < 2 || 2 === r.length && "" === r[1].match.def));) ;
            return i
        }

        function ki(n) {
            return v().validPositions[n] === r ? tt(n) : v().validPositions[n].input
        }

        function st(t, i, u, f, e) {
            var s, h;
            f && n.isFunction(c.onBeforeWrite) && (s = c.onBeforeWrite(f, i, u, c), s && (s.refreshFromBuffer && (h = s.refreshFromBuffer, dt(!0 === h ? h : h.start, h.end, s.buffer || i), i = p(!0)), u !== r && (u = s.caret !== r ? s.caret : u)));
            t !== r && (t.inputmask._valueSet(i.join("")), u === r || f !== r && "blur" === f.type ? si(t, i, u) : o && f && "input" === f.type ? setTimeout(function () {
                b(t, u)
            }, 0) : b(t, u), !0 === e && (ti = !0, n(t).trigger("input")))
        }

        function tt(t, i, u) {
            var s, f, o, e;
            if (i = i || lt(t).match, i.placeholder !== r || !0 === u) return n.isFunction(i.placeholder) ? i.placeholder(c) : i.placeholder;
            if (null === i.fn) {
                if (t > -1 && v().validPositions[t] === r && (f = et(t), o = [], f.length > 1 + ("" === f[f.length - 1].match.def ? 1 : 0))) for (e = 0; e < f.length; e++) if (!0 !== f[e].match.optionality && !0 !== f[e].match.optionalQuantifier && (null === f[e].match.fn || s === r || !1 !== f[e].match.fn.test(s.match.def, v(), t, !0, c)) && (o.push(f[e]), null === f[e].match.fn && (s = f[e]), o.length > 1 && /[0-9a-bA-Z]/.test(o[0].match.def))) return c.placeholder.charAt(t % c.placeholder.length);
                return i.def
            }
            return c.placeholder.charAt(t % c.placeholder.length)
        }

        function vt(t, f, e, o, s) {
            function tt(n, t) {
                return -1 !== rt().slice(n, d(n)).join("").indexOf(t) && !ut(n) && lt(n).match.nativeDef === t.charAt(t.length - 1)
            }

            var y = o.slice(), b = "", l = 0, h = r, k, a, g;
            (it(), v().p = d(-1), e) || (!0 !== c.autoUnmask ? (k = rt().slice(0, d(-1)).join(""), a = y.join("").match(new RegExp("^" + u.escapeRegex(k), "g")), a && a.length > 0 && (y.splice(0, a.length * k.length), l = d(l))) : l = d(l));
            (n.each(y, function (i, u) {
                var o, a, d, s;
                if (u !== r) {
                    o = new n.Event("_checkval");
                    o.which = u.charCodeAt(0);
                    b += u;
                    var f = w(r, !0), y = v().validPositions[f], k = ct(f + 1, y ? y.locator.slice() : r, f);
                    !tt(l, b) || e || c.autoUnmask ? (a = e ? i : null == k.match.fn && k.match.optionality && f + 1 < v().p ? f + 1 : v().p, h = nt.keypressEvent.call(t, o, !0, !1, e, a), l = a + 1, b = "") : h = nt.keypressEvent.call(t, o, !0, !1, !0, f + 1);
                    !e && n.isFunction(c.onBeforeWrite) && (d = h.forwardPosition, (h = c.onBeforeWrite(o, p(), h.forwardPosition, c), h.forwardPosition = d, h && h.refreshFromBuffer) && (s = h.refreshFromBuffer, dt(!0 === s ? s : s.start, s.end, h.buffer), it(!0), h.caret && (v().p = h.caret, h.forwardPosition = h.caret)))
                }
            }), f) && (g = r, i.activeElement === t && h && (g = c.numericInput ? wt(h.forwardPosition) : h.forwardPosition), st(t, p(), g, s || new n.Event("checkval"), s && "input" === s.type))
        }

        function yi(t) {
            var i, u, f, e, o;
            if (t) {
                if (t.inputmask === r) return t.value;
                t.inputmask && t.inputmask.refreshValue && nt.setValueEvent.call(t)
            }
            i = [];
            u = v().validPositions;
            for (f in u) u[f].match && null != u[f].match.fn && i.push(u[f].input);
            return e = 0 === i.length ? "" : (g ? i.reverse() : i).join(""), n.isFunction(c.onUnMask) && (o = (g ? p().slice().reverse() : p()).join(""), e = c.onUnMask(o, e, c)), e
        }

        function b(n, u, f, e) {
            function s(n) {
                return !0 !== e && g && "number" == typeof n && (!c.greedy || "" !== c.placeholder) && (n = p().join("").length - n), n
            }

            var o, h, v, l;
            if (u === r) return n.setSelectionRange ? (u = n.selectionStart, f = n.selectionEnd) : t.getSelection ? (o = t.getSelection().getRangeAt(0), o.commonAncestorContainer.parentNode !== n && o.commonAncestorContainer !== n || (u = o.startOffset, f = o.endOffset)) : i.selection && i.selection.createRange && (o = i.selection.createRange(), u = 0 - o.duplicate().moveStart("character", -n.inputmask._valueGet().length), f = u + o.text.length), {
                begin: s(u),
                end: s(f)
            };
            (u.begin !== r && (f = u.end, u = u.begin), "number" == typeof u) && (u = s(u), f = s(f), f = "number" == typeof f ? f : u, h = parseInt(((n.ownerDocument.defaultView || t).getComputedStyle ? (n.ownerDocument.defaultView || t).getComputedStyle(n, null) : n.currentStyle).fontSize) * f, (n.scrollLeft = h > n.scrollWidth ? h : 0, a || !1 !== c.insertMode || u !== f || f++, n.setSelectionRange) ? (n.selectionStart = u, n.selectionEnd = f) : t.getSelection ? ((o = i.createRange(), n.firstChild === r || null === n.firstChild) && (v = i.createTextNode(""), n.appendChild(v)), o.setStart(n.firstChild, u < n.inputmask._valueGet().length ? u : n.inputmask._valueGet().length), o.setEnd(n.firstChild, f < n.inputmask._valueGet().length ? f : n.inputmask._valueGet().length), o.collapse(!0), l = t.getSelection(), l.removeAllRanges(), l.addRange(o)) : n.createTextRange && (o = n.createTextRange(), o.collapse(!0), o.moveEnd("character", f), o.moveStart("character", u), o.select()), si(n, r, {
                begin: u,
                end: f
            }))
        }

        function ei(t) {
            for (var u, h = p(), e = h.length, c = w(), o = {}, f = v().validPositions[c], l = f !== r ? f.locator.slice() : r, s, i = c + 1; i < h.length; i++) u = ct(i, l, i - 1), l = u.locator.slice(), o[i] = n.extend(!0, {}, u);
            for (s = f && f.alternation !== r ? f.locator[f.alternation] : r, i = e - 1; i > c && (u = o[i], (u.match.optionality || u.match.optionalQuantifier && u.match.newBlockMarker || s && (s !== o[i].locator[f.alternation] && null != u.match.fn || null === u.match.fn && u.locator[f.alternation] && fi(u.locator[f.alternation].toString().split(","), s.toString().split(",")) && "" !== et(i)[0].def)) && h[i] === tt(i, u.match)); i--) e--;
            return t ? {l: e, def: o[e] ? o[e].match : r} : e
        }

        function gt(n) {
            for (var i, t = ei(), f = n.length, u = v().validPositions[w()]; t < f && !ut(t, !0) && (i = u !== r ? ct(t, u.locator.slice(""), u) : lt(t)) && !0 !== i.match.optionality && (!0 !== i.match.optionalQuantifier && !0 !== i.match.newBlockMarker || t + 1 === f && "" === (u !== r ? ct(t + 1, u.locator.slice(""), u) : lt(t + 1)).match.def);) t++;
            for (; (i = v().validPositions[t - 1]) && i && i.match.optionality && i.input === c.skipOptionalPartCharacter;) t--;
            return n.splice(t), n
        }

        function yt(t) {
            var i, u;
            if (n.isFunction(c.isComplete)) return c.isComplete(t, c);
            if ("*" === c.repeat) return r;
            var e = !1, f = ei(!0), o = wt(f.l);
            if (f.def === r || f.def.newBlockMarker || f.def.optionality || f.def.optionalQuantifier) for (e = !0, i = 0; i <= o; i++) if (u = ct(i).match, null !== u.fn && v().validPositions[i] === r && !0 !== u.optionality && !0 !== u.optionalQuantifier || null === u.fn && t[i] !== tt(i, u)) {
                e = !1;
                break
            }
            return e
        }

        function oi(t, i, f, e) {
            var s, o;
            (c.numericInput || g) && (i === u.keyCode.BACKSPACE ? i = u.keyCode.DELETE : i === u.keyCode.DELETE && (i = u.keyCode.BACKSPACE), g) && (s = f.end, f.end = f.begin, f.begin = s);
            i === u.keyCode.BACKSPACE && (f.end - f.begin < 1 || !1 === c.insertMode) ? (f.begin = wt(f.begin), v().validPositions[f.begin] === r || v().validPositions[f.begin].input !== c.groupSeparator && v().validPositions[f.begin].input !== c.radixPoint || f.begin--) : i === u.keyCode.DELETE && f.begin === f.end && (f.end = ut(f.end, !0) ? f.end + 1 : d(f.end) + 1, v().validPositions[f.begin] === r || v().validPositions[f.begin].input !== c.groupSeparator && v().validPositions[f.begin].input !== c.radixPoint || f.end++);
            ai(f.begin, f.end, !1, e);
            !0 !== e && function () {
                var i, e;
                if (c.keepStatic) {
                    for (var f = [], u = w(-1, !0), s = n.extend(!0, {}, v().validPositions), o = v().validPositions[u]; u >= 0; u--) if (i = v().validPositions[u], i) {
                        if (!0 !== i.generatedInput && /[0-9a-bA-Z]/.test(i.input) && f.push(i.input), delete v().validPositions[u], i.alternation !== r && i.locator[i.alternation] !== o.locator[i.alternation]) break;
                        o = i
                    }
                    if (u > -1) for (v().p = d(w(-1, !0)); f.length > 0;) e = new n.Event("keypress"), e.which = f.pop().charCodeAt(0), nt.keypressEvent.call(t, e, !0, !1, !1, v().p); else v().validPositions = n.extend(!0, {}, s)
                }
            }();
            o = w(f.begin, !0);
            o < f.begin ? v().p = d(o) : !0 !== e && (v().p = f.begin)
        }

        function pi(r) {
            function s(n) {
                var f, t = i.createElement("span"), e, c, o, s, h, l;
                for (e in u) isNaN(e) && -1 !== e.indexOf("font") && (t.style[e] = u[e]);
                for (t.style.textTransform = u.textTransform, t.style.letterSpacing = u.letterSpacing, t.style.position = "absolute", t.style.height = "auto", t.style.width = "auto", t.style.visibility = "hidden", t.style.whiteSpace = "nowrap", i.body.appendChild(t), o = r.inputmask._valueGet(), s = 0, f = 0, c = o.length; f <= c; f++) {
                    if (t.innerHTML += o.charAt(f) || "_", t.offsetWidth >= n) {
                        h = n - s;
                        l = t.offsetWidth - n;
                        t.innerHTML = o.charAt(f);
                        h -= t.offsetWidth / 3;
                        f = h < l ? f - 1 : f;
                        break
                    }
                    s = t.offsetWidth
                }
                return i.body.removeChild(t), f
            }

            function o() {
                ft.style.position = "absolute";
                ft.style.top = e.top + "px";
                ft.style.left = e.left + "px";
                ft.style.width = parseInt(r.offsetWidth) - parseInt(u.paddingLeft) - parseInt(u.paddingRight) - parseInt(u.borderLeftWidth) - parseInt(u.borderRightWidth) + "px";
                ft.style.height = parseInt(r.offsetHeight) - parseInt(u.paddingTop) - parseInt(u.paddingBottom) - parseInt(u.borderTopWidth) - parseInt(u.borderBottomWidth) + "px";
                ft.style.lineHeight = ft.style.height;
                ft.style.zIndex = isNaN(u.zIndex) ? -1 : u.zIndex - 1;
                ft.style.webkitAppearance = "textfield";
                ft.style.mozAppearance = "textfield";
                ft.style.Appearance = "textfield"
            }

            var e = n(r).position(), u = (r.ownerDocument.defaultView || t).getComputedStyle(r, null), f;
            r.parentNode;
            ft = i.createElement("div");
            i.body.appendChild(ft);
            for (f in u) u.hasOwnProperty(f) && isNaN(f) && "cssText" !== f && -1 == f.indexOf("webkit") && (ft.style[f] = u[f]);
            r.style.backgroundColor = "transparent";
            r.style.color = "transparent";
            r.style.webkitAppearance = "caret";
            r.style.mozAppearance = "caret";
            r.style.Appearance = "caret";
            o();
            n(t).on("resize", function () {
                e = n(r).position();
                u = (r.ownerDocument.defaultView || t).getComputedStyle(r, null);
                o()
            });
            n(r).on("click", function (n) {
                return b(r, s(n.clientX)), nt.clickEvent.call(this, [n])
            });
            n(r).on("keydown", function (n) {
                n.shiftKey || !1 === c.insertMode || setTimeout(function () {
                    si(r)
                }, 0)
            })
        }

        function si(n, t, u) {
            function y() {
                h || null !== s.fn && e.input !== r ? h && null !== s.fn && e.input !== r && (h = !1, o += "<\/span>") : (h = !0, o += "<span class='im-static''>")
            }

            var o, h, l, s, e, f, a;
            if (ft !== r) {
                if (t = t || p(), u === r ? u = b(n) : u.begin === r && (u = {
                    begin: u,
                    end: u
                }), o = "", h = !1, "" != t) {
                    f = 0;
                    a = w();
                    do f === u.begin && i.activeElement === n && (o += "<span class='im-caret' style='border-right-width: 1px;border-right-style: solid;'><\/span>"), v().validPositions[f] ? (e = v().validPositions[f], s = e.match, l = e.locator.slice(), y(), o += e.input) : (e = ct(f, l, f - 1), s = e.match, l = e.locator.slice(), (!1 === c.jitMasking || f < a || "number" == typeof c.jitMasking && isFinite(c.jitMasking) && c.jitMasking > f) && (y(), o += tt(f, s))), f++; while ((pt === r || f < pt) && (null !== s.fn || "" !== s.def) || a > f)
                }
                ft.innerHTML = o
            }
        }

        var ui;
        s = s || this.maskset;
        c = c || this.opts;
        var ht, ni, pt, ft, ot, y = this.el, g = this.isRTL, hi = !1, ti = !1, wi = !1, ii = !1, k = {
            on: function (t, i, f) {
                var e = function (t) {
                    var i, o, s, e;
                    if (this.inputmask === r && "FORM" !== this.nodeName) i = n.data(this, "_inputmask_opts"), i ? new u(i).mask(this) : k.off(this); else {
                        if ("setvalue" === t.type || "FORM" === this.nodeName || !(this.disabled || this.readOnly && !("keydown" === t.type && t.ctrlKey && 67 === t.keyCode || !1 === c.tabThrough && t.keyCode === u.keyCode.TAB))) {
                            switch (t.type) {
                                case"input":
                                    if (!0 === ti) return ti = !1, t.preventDefault();
                                    break;
                                case"keydown":
                                    hi = !1;
                                    ti = !1;
                                    break;
                                case"keypress":
                                    if (!0 === hi) return t.preventDefault();
                                    hi = !0;
                                    break;
                                case"click":
                                    if (h || l) return o = this, s = arguments, setTimeout(function () {
                                        f.apply(o, s)
                                    }, 0), !1
                            }
                            return e = f.apply(this, arguments), !1 === e && (t.preventDefault(), t.stopPropagation()), e
                        }
                        t.preventDefault()
                    }
                };
                t.inputmask.events[i] = t.inputmask.events[i] || [];
                t.inputmask.events[i].push(e);
                -1 !== n.inArray(i, ["submit", "reset"]) ? null != t.form && n(t.form).on(i, e) : n(t).on(i, e)
            }, off: function (t, i) {
                if (t.inputmask && t.inputmask.events) {
                    var r;
                    i ? (r = [], r[i] = t.inputmask.events[i]) : r = t.inputmask.events;
                    n.each(r, function (i, r) {
                        for (; r.length > 0;) {
                            var u = r.pop();
                            -1 !== n.inArray(i, ["submit", "reset"]) ? null != t.form && n(t.form).off(i, u) : n(t).off(i, u)
                        }
                        delete t.inputmask.events[i]
                    })
                }
            }
        }, nt = {
            keydownEvent: function (t) {
                var f = this, s = n(f), e = t.keyCode, r = b(f), o;
                e === u.keyCode.BACKSPACE || e === u.keyCode.DELETE || l && e === u.keyCode.BACKSPACE_SAFARI || t.ctrlKey && e === u.keyCode.X && !function (n) {
                    var t = i.createElement("input"), r = "on" + n, u = r in t;
                    return u || (t.setAttribute(r, "return;"), u = "function" == typeof t[r]), t = null, u
                }("cut") ? (t.preventDefault(), oi(f, e, r), st(f, p(!0), v().p, t, f.inputmask._valueGet() !== p().join("")), f.inputmask._valueGet() === rt().join("") ? s.trigger("cleared") : !0 === yt(p()) && s.trigger("complete")) : e === u.keyCode.END || e === u.keyCode.PAGE_DOWN ? (t.preventDefault(), o = d(w()), c.insertMode || o !== v().maskLength || t.shiftKey || o--, b(f, t.shiftKey ? r.begin : o, o, !0)) : e === u.keyCode.HOME && !t.shiftKey || e === u.keyCode.PAGE_UP ? (t.preventDefault(), b(f, 0, t.shiftKey ? r.begin : 0, !0)) : (c.undoOnEscape && e === u.keyCode.ESCAPE || 90 === e && t.ctrlKey) && !0 !== t.altKey ? (vt(f, !0, !1, ht.split("")), s.trigger("click")) : e !== u.keyCode.INSERT || t.shiftKey || t.ctrlKey ? !0 === c.tabThrough && e === u.keyCode.TAB ? (!0 === t.shiftKey ? (null === lt(r.begin).match.fn && (r.begin = d(r.begin)), r.end = wt(r.begin, !0), r.begin = wt(r.end, !0)) : (r.begin = d(r.begin, !0), r.end = d(r.begin, !0), r.end < v().maskLength && r.end--), r.begin < v().maskLength && (t.preventDefault(), b(f, r.begin, r.end))) : t.shiftKey || !1 === c.insertMode && (e === u.keyCode.RIGHT ? setTimeout(function () {
                    var n = b(f);
                    b(f, n.begin)
                }, 0) : e === u.keyCode.LEFT && setTimeout(function () {
                    var n = b(f);
                    b(f, g ? n.begin + 1 : n.begin - 1)
                }, 0)) : (c.insertMode = !c.insertMode, b(f, c.insertMode || r.begin !== v().maskLength ? r.begin : r.begin - 1));
                c.onKeyDown.call(this, t, p(), b(f).begin, c);
                wi = -1 !== n.inArray(e, c.ignorables)
            }, keypressEvent: function (t, i, f, e, o) {
                var a = this, w = n(a), h = t.which || t.charCode || t.keyCode, l, k, g, s, y;
                return !(!0 === i || t.ctrlKey && t.altKey) && (t.ctrlKey || t.metaKey || wi) ? (h === u.keyCode.ENTER && ht !== p().join("") && (ht = p().join(""), setTimeout(function () {
                    w.trigger("change")
                }, 0)), !0) : h && (46 === h && !1 === t.shiftKey && "" !== c.radixPoint && (h = c.radixPoint.charCodeAt(0)), k = i ? {
                    begin: o,
                    end: o
                } : b(a), g = String.fromCharCode(h), v().writeOutBuffer = !0, s = at(k, g, e), (!1 !== s && (it(!0), l = s.caret !== r ? s.caret : i ? s.pos + 1 : d(s.pos), v().p = l), !1 !== f && (setTimeout(function () {
                    c.onKeyValidation.call(a, h, s, c)
                }, 0), v().writeOutBuffer && !1 !== s)) && (y = p(), st(a, y, c.numericInput && s.caret === r ? wt(l) : l, t, !0 !== i), !0 !== i && setTimeout(function () {
                    !0 === yt(y) && w.trigger("complete")
                }, 0)), t.preventDefault(), i) ? (s.forwardPosition = l, s) : void 0
            }, pasteEvent: function (i) {
                var h, s = this, l = i.originalEvent || i, a = n(s), r = s.inputmask._valueGet(!0), u = b(s), f, e, o;
                if (g && (h = u.end, u.end = u.begin, u.begin = h), f = r.substr(0, u.begin), e = r.substr(u.end, r.length), f === (g ? rt().reverse() : rt()).slice(0, u.begin).join("") && (f = ""), e === (g ? rt().reverse() : rt()).slice(u.end).join("") && (e = ""), g && (h = f, f = e, e = h), t.clipboardData && t.clipboardData.getData) r = f + t.clipboardData.getData("Text") + e; else {
                    if (!l.clipboardData || !l.clipboardData.getData) return !0;
                    r = f + l.clipboardData.getData("text/plain") + e
                }
                if (o = r, n.isFunction(c.onBeforePaste)) {
                    if (!1 === (o = c.onBeforePaste(r, c))) return i.preventDefault();
                    o || (o = r)
                }
                return vt(s, !1, !1, g ? o.split("").reverse() : o.toString().split("")), st(s, p(), d(w()), i, ht !== p().join("")), !0 === yt(p()) && a.trigger("complete"), i.preventDefault()
            }, inputFallBackEvent: function (t) {
                var f = this, i = f.inputmask._valueGet(), r, y, s, e, a, l;
                if (p().join("") !== i) {
                    if (r = b(f), "." === i.charAt(r.begin - 1) && "" !== c.radixPoint && (i = i.split(""), i[r.begin - 1] = c.radixPoint.charAt(0), i = i.join("")), i.charAt(r.begin - 1) === c.radixPoint && i.length > p().length) return s = new n.Event("keypress"), s.which = c.radixPoint.charCodeAt(0), nt.keypressEvent.call(f, s, !0, !0, !1, r.begin), !1;
                    if ((i = i.replace(new RegExp("(" + u.escapeRegex(rt().join("")) + ")*"), ""), h) && (y = i.replace(p().join(""), ""), 1 === y.length)) return s = new n.Event("keypress"), s.which = y.charCodeAt(0), nt.keypressEvent.call(f, s, !0, !0, !1, v().validPositions[r.begin - 1] ? r.begin : r.begin - 1), !1;
                    if (r.begin > i.length && (b(f, i.length), r = b(f)), p().length - i.length != 1 || i.charAt(r.begin) === p()[r.begin] || i.charAt(r.begin + 1) === p()[r.begin] || ut(r.begin)) {
                        for (e = [], a = bt(!0, 1).join(""), e.push(i.substr(0, r.begin)), e.push(i.substr(r.begin)); null === i.match(u.escapeRegex(a) + "$");) a = a.slice(1);
                        i = i.replace(a, "");
                        n.isFunction(c.onBeforeMask) && (i = c.onBeforeMask(i, c) || i);
                        vt(f, !0, !1, i.split(""), t);
                        var k = b(f).begin, w = f.inputmask._valueGet(), d = w.indexOf(e[0]);
                        if (0 === d && k !== e[0].length) b(f, e[0].length), o && setTimeout(function () {
                            b(f, e[0].length)
                        }, 0); else {
                            for (; null === w.match(u.escapeRegex(e[1]) + "$");) e[1] = e[1].substr(1);
                            l = w.indexOf(e[1]);
                            -1 !== l && "" !== e[1] && k > l && l > d && (b(f, l), o && setTimeout(function () {
                                b(f, l)
                            }, 0))
                        }
                        !0 === yt(p()) && n(f).trigger("complete")
                    } else t.keyCode = u.keyCode.BACKSPACE, nt.keydownEvent.call(f, t);
                    t.preventDefault()
                }
            }, setValueEvent: function () {
                this.inputmask.refreshValue = !1;
                var i = this, t = i.inputmask._valueGet(!0);
                n.isFunction(c.onBeforeMask) && (t = c.onBeforeMask(t, c) || t);
                t = t.split("");
                vt(i, !0, !1, g ? t.reverse() : t);
                ht = p().join("");
                (c.clearMaskOnLostFocus || c.clearIncomplete) && i.inputmask._valueGet() === rt().join("") && i.inputmask._valueSet("")
            }, focusEvent: function (n) {
                var t = this, i = t.inputmask._valueGet();
                c.showMaskOnFocus && (!c.showMaskOnHover || c.showMaskOnHover && "" === i) && (t.inputmask._valueGet() !== p().join("") ? st(t, p(), d(w())) : !1 === ii && b(t, d(w())));
                !0 === c.positionCaretOnTab && !1 === ii && (st(t, p(), b(t)), nt.clickEvent.apply(t, [n, !0]));
                ht = p().join("")
            }, mouseleaveEvent: function () {
                var n = this, t, r;
                (ii = !1, c.clearMaskOnLostFocus && i.activeElement !== n) && (t = p().slice(), r = n.inputmask._valueGet(), r !== n.getAttribute("placeholder") && "" !== r && (-1 === w() && r === rt().join("") ? t = [] : gt(t), st(n, t)))
            }, clickEvent: function (t, u) {
                function e(t) {
                    var i, f, u;
                    if ("" !== c.radixPoint && (i = v().validPositions, i[t] === r || i[t].input === tt(t))) {
                        if (t < d(-1)) return !0;
                        if (f = n.inArray(c.radixPoint, p()), -1 !== f) {
                            for (u in i) if (f < u && i[u].input !== tt(u)) return !1;
                            return !0
                        }
                    }
                    return !1
                }

                var f = this;
                setTimeout(function () {
                    var n, s, o;
                    if (i.activeElement === f && (n = b(f), u && (g ? n.end = n.begin : n.begin = n.end), n.begin === n.end)) switch (c.positionCaretOnClick) {
                        case"none":
                            break;
                        case"radixFocus":
                            if (e(n.begin)) {
                                s = p().join("").indexOf(c.radixPoint);
                                b(f, c.numericInput ? d(s) : s);
                                break
                            }
                        default:
                            var r = n.begin, h = w(r, !0), t = d(h);
                            r < t ? b(f, ut(r) || ut(r - 1) ? r : d(r)) : (o = tt(t), ("" === o || p()[t] === o || !0 === lt(t).match.optionalQuantifier) && (ut(t) || lt(t).match.def !== o) || (t = d(t)), b(f, t))
                    }
                }, 0)
            }, dblclickEvent: function () {
                var n = this;
                setTimeout(function () {
                    b(n, 0, d(w()))
                }, 0)
            }, cutEvent: function (r) {
                var f = this, s = n(f), e = b(f), h = r.originalEvent || r, c = t.clipboardData || h.clipboardData,
                    o = g ? p().slice(e.end, e.begin) : p().slice(e.begin, e.end);
                c.setData("text", g ? o.reverse().join("") : o.join(""));
                i.execCommand && i.execCommand("copy");
                oi(f, u.keyCode.DELETE, e);
                st(f, p(), v().p, r, ht !== p().join(""));
                f.inputmask._valueGet() === rt().join("") && s.trigger("cleared")
            }, blurEvent: function (t) {
                var e = n(this), u = this, f, i;
                u.inputmask && (f = u.inputmask._valueGet(), i = p().slice(), "" !== f && (c.clearMaskOnLostFocus && (-1 === w() && f === rt().join("") ? i = [] : gt(i)), !1 === yt(i) && (setTimeout(function () {
                    e.trigger("incomplete")
                }, 0), c.clearIncomplete && (it(), i = c.clearMaskOnLostFocus ? [] : rt().slice())), st(u, i, r, t)), ht !== p().join("") && (ht = i.join(""), e.trigger("change")))
            }, mouseenterEvent: function () {
                var n = this;
                ii = !0;
                i.activeElement !== n && c.showMaskOnHover && n.inputmask._valueGet() !== p().join("") && st(n, p())
            }, submitEvent: function () {
                ht !== p().join("") && ni.trigger("change");
                c.clearMaskOnLostFocus && -1 === w() && y.inputmask._valueGet && y.inputmask._valueGet() === rt().join("") && y.inputmask._valueSet("");
                c.removeMaskOnSubmit && (y.inputmask._valueSet(y.inputmask.unmaskedvalue(), !0), setTimeout(function () {
                    st(y, p())
                }, 0))
            }, resetEvent: function () {
                y.inputmask.refreshValue = !0;
                setTimeout(function () {
                    ni.trigger("setvalue")
                }, 0)
            }
        };
        if (e !== r) switch (e.action) {
            case"isComplete":
                return y = e.el, yt(p());
            case"unmaskedvalue":
                return y !== r && e.value === r || (ot = e.value, ot = (n.isFunction(c.onBeforeMask) ? c.onBeforeMask(ot, c) || ot : ot).split(""), vt(r, !1, !1, g ? ot.reverse() : ot), n.isFunction(c.onBeforeWrite) && c.onBeforeWrite(r, p(), 0, c)), yi(y);
            case"mask":
                !function (t) {
                    var e, f, u;
                    k.off(t);
                    e = function (t, u) {
                        var o = t.getAttribute("type"),
                            f = "INPUT" === t.tagName && -1 !== n.inArray(o, u.supportsInputType) || t.isContentEditable || "TEXTAREA" === t.tagName,
                            e;
                        return f || ("INPUT" === t.tagName ? (e = i.createElement("input"), e.setAttribute("type", o), f = "text" === e.type, e = null) : f = "partial"), !1 !== f && function (t) {
                            function s() {
                                return this.inputmask ? this.inputmask.opts.autoUnmask ? this.inputmask.unmaskedvalue() : -1 !== w() || !0 !== u.nullable ? i.activeElement === this && u.clearMaskOnLostFocus ? (g ? gt(p().slice()).reverse() : gt(p().slice())).join("") : f.call(this) : "" : f.call(this)
                            }

                            function h(t) {
                                e.call(this, t);
                                this.inputmask && n(this).trigger("setvalue")
                            }

                            var f, e, o;
                            t.inputmask.__valueGet || (!0 !== u.noValuePatching && (Object.getOwnPropertyDescriptor ? ("function" != typeof Object.getPrototypeOf && (Object.getPrototypeOf = "object" == typeof "test".__proto__ ? function (n) {
                                return n.__proto__
                            } : function (n) {
                                return n.constructor.prototype
                            }), o = Object.getPrototypeOf ? Object.getOwnPropertyDescriptor(Object.getPrototypeOf(t), "value") : r, o && o.get && o.set ? (f = o.get, e = o.set, Object.defineProperty(t, "value", {
                                get: s,
                                set: h,
                                configurable: !0
                            })) : "INPUT" !== t.tagName && (f = function () {
                                return this.textContent
                            }, e = function (n) {
                                this.textContent = n
                            }, Object.defineProperty(t, "value", {
                                get: s,
                                set: h,
                                configurable: !0
                            }))) : i.__lookupGetter__ && t.__lookupGetter__("value") && (f = t.__lookupGetter__("value"), e = t.__lookupSetter__("value"), t.__defineGetter__("value", s), t.__defineSetter__("value", h)), t.inputmask.__valueGet = f, t.inputmask.__valueSet = e), t.inputmask._valueGet = function (n) {
                                return g && !0 !== n ? f.call(this.el).split("").reverse().join("") : f.call(this.el)
                            }, t.inputmask._valueSet = function (n, t) {
                                e.call(this.el, null === n || n === r ? "" : !0 !== t && g ? n.split("").reverse().join("") : n)
                            }, f === r && (f = function () {
                                return this.value
                            }, e = function (n) {
                                this.value = n
                            }, function (t) {
                                if (n.valHooks && (n.valHooks[t] === r || !0 !== n.valHooks[t].inputmaskpatch)) {
                                    var i = n.valHooks[t] && n.valHooks[t].get ? n.valHooks[t].get : function (n) {
                                        return n.value
                                    }, f = n.valHooks[t] && n.valHooks[t].set ? n.valHooks[t].set : function (n, t) {
                                        return n.value = t, n
                                    };
                                    n.valHooks[t] = {
                                        get: function (n) {
                                            if (n.inputmask) {
                                                if (n.inputmask.opts.autoUnmask) return n.inputmask.unmaskedvalue();
                                                var t = i(n);
                                                return -1 !== w(r, r, n.inputmask.maskset.validPositions) || !0 !== u.nullable ? t : ""
                                            }
                                            return i(n)
                                        }, set: function (t, i) {
                                            var r, u = n(t);
                                            return r = f(t, i), t.inputmask && u.trigger("setvalue"), r
                                        }, inputmaskpatch: !0
                                    }
                                }
                            }(t.type), function (t) {
                                k.on(t, "mouseenter", function () {
                                    var t = n(this);
                                    this.inputmask._valueGet() !== p().join("") && t.trigger("setvalue")
                                })
                            }(t)))
                        }(t), f
                    }(t, c);
                    !1 !== e && (y = t, ni = n(y), !0 === c.colorMask && pi(y), o && (y.hasOwnProperty("inputmode") && (y.inputmode = c.inputmode, y.setAttribute("inputmode", c.inputmode)), "rtfm" === c.androidHack && (!0 !== c.colorMask && pi(y), y.type = "password")), !0 === e && (k.on(y, "submit", nt.submitEvent), k.on(y, "reset", nt.resetEvent), k.on(y, "mouseenter", nt.mouseenterEvent), k.on(y, "blur", nt.blurEvent), k.on(y, "focus", nt.focusEvent), k.on(y, "mouseleave", nt.mouseleaveEvent), !0 !== c.colorMask && k.on(y, "click", nt.clickEvent), k.on(y, "dblclick", nt.dblclickEvent), k.on(y, "paste", nt.pasteEvent), k.on(y, "dragdrop", nt.pasteEvent), k.on(y, "drop", nt.pasteEvent), k.on(y, "cut", nt.cutEvent), k.on(y, "complete", c.oncomplete), k.on(y, "incomplete", c.onincomplete), k.on(y, "cleared", c.oncleared), o || !0 === c.inputEventOnly || (k.on(y, "keydown", nt.keydownEvent), k.on(y, "keypress", nt.keypressEvent)), k.on(y, "compositionstart", n.noop), k.on(y, "compositionupdate", n.noop), k.on(y, "compositionend", n.noop), k.on(y, "keyup", n.noop), k.on(y, "input", nt.inputFallBackEvent), k.on(y, "beforeinput", n.noop)), k.on(y, "setvalue", nt.setValueEvent), ht = rt().join(""), "" !== y.inputmask._valueGet(!0) || !1 === c.clearMaskOnLostFocus || i.activeElement === y) && (f = n.isFunction(c.onBeforeMask) ? c.onBeforeMask(y.inputmask._valueGet(!0), c) || y.inputmask._valueGet(!0) : y.inputmask._valueGet(!0), "" !== f && vt(y, !0, !1, g ? f.split("").reverse() : f.split("")), u = p().slice(), ht = u.join(""), !1 === yt(u) && c.clearIncomplete && it(), c.clearMaskOnLostFocus && i.activeElement !== y && (-1 === w() ? u = [] : gt(u)), st(y, u), i.activeElement === y && b(y, d(w())))
                }(y);
                break;
            case"format":
                return ot = (n.isFunction(c.onBeforeMask) ? c.onBeforeMask(e.value, c) || e.value : e.value).split(""), vt(r, !0, !1, g ? ot.reverse() : ot), e.metadata ? {
                    value: g ? p().slice().reverse().join("") : p().join(""),
                    metadata: f.call(this, {action: "getmetadata"}, s, c)
                } : g ? p().slice().reverse().join("") : p().join("");
            case"isValid":
                e.value ? (ot = e.value.split(""), vt(r, !0, !0, g ? ot.reverse() : ot)) : e.value = p().join("");
                for (var ci = p(), li = ei(), ri = ci.length - 1; ri > li && !ut(ri); ri--) ;
                return ci.splice(li, ri + 1 - li), yt(ci) && e.value === p().join("");
            case"getemptymask":
                return rt().join("");
            case"remove":
                return y && y.inputmask && (ni = n(y), y.inputmask._valueSet(c.autoUnmask ? yi(y) : y.inputmask._valueGet(!0)), k.off(y), Object.getOwnPropertyDescriptor && Object.getPrototypeOf ? Object.getOwnPropertyDescriptor(Object.getPrototypeOf(y), "value") && y.inputmask.__valueGet && Object.defineProperty(y, "value", {
                    get: y.inputmask.__valueGet,
                    set: y.inputmask.__valueSet,
                    configurable: !0
                }) : i.__lookupGetter__ && y.__lookupGetter__("value") && y.inputmask.__valueGet && (y.__defineGetter__("value", y.inputmask.__valueGet), y.__defineSetter__("value", y.inputmask.__valueSet)), y.inputmask = r), y;
            case"getmetadata":
                return n.isArray(s.metadata) ? (ui = bt(!0, 0, !1).join(""), n.each(s.metadata, function (n, t) {
                    if (t.mask === ui) return ui = t, !1
                }), ui) : s.metadata
        }
    }

    var s = navigator.userAgent, a = /mobile/i.test(s), h = /iemobile/i.test(s), l = /iphone/i.test(s) && !h,
        o = /android/i.test(s) && !h;
    return u.prototype = {
        dataAttribute: "data-inputmask",
        defaults: {
            placeholder: "_",
            optionalmarker: {start: "[", end: "]"},
            quantifiermarker: {start: "{", end: "}"},
            groupmarker: {start: "(", end: ")"},
            alternatormarker: "|",
            escapeChar: "\\",
            mask: null,
            regex: null,
            oncomplete: n.noop,
            onincomplete: n.noop,
            oncleared: n.noop,
            repeat: 0,
            greedy: !0,
            autoUnmask: !1,
            removeMaskOnSubmit: !1,
            clearMaskOnLostFocus: !0,
            insertMode: !0,
            clearIncomplete: !1,
            alias: null,
            onKeyDown: n.noop,
            onBeforeMask: null,
            onBeforePaste: function (t, i) {
                return n.isFunction(i.onBeforeMask) ? i.onBeforeMask(t, i) : t
            },
            onBeforeWrite: null,
            onUnMask: null,
            showMaskOnFocus: !0,
            showMaskOnHover: !0,
            onKeyValidation: n.noop,
            skipOptionalPartCharacter: " ",
            numericInput: !1,
            rightAlign: !1,
            undoOnEscape: !0,
            radixPoint: "",
            radixPointDefinitionSymbol: r,
            groupSeparator: "",
            keepStatic: null,
            positionCaretOnTab: !0,
            tabThrough: !1,
            supportsInputType: ["text", "tel", "password"],
            ignorables: [8, 9, 13, 19, 27, 33, 34, 35, 36, 37, 38, 39, 40, 45, 46, 93, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 0, 229],
            isComplete: null,
            canClearPosition: n.noop,
            preValidation: null,
            postValidation: null,
            staticDefinitionSymbol: r,
            jitMasking: !1,
            nullable: !0,
            inputEventOnly: !1,
            noValuePatching: !1,
            positionCaretOnClick: "lvp",
            casing: null,
            inputmode: "verbatim",
            colorMask: !1,
            androidHack: !1
        },
        definitions: {
            9: {validator: "[0-9]", cardinality: 1, definitionSymbol: "*"},
            a: {validator: "[A-Za-zА-яЁёÀ-ÿµ]", cardinality: 1, definitionSymbol: "*"},
            "*": {
                validator: function () {
                    return !0
                }, cardinality: 1
            }
        },
        aliases: {},
        masksCache: {},
        mask: function (o) {
            function h(i, u, f, e) {
                function v(n, u) {
                    null !== (u = u !== r ? u : i.getAttribute(e + "-" + n)) && ("string" == typeof u && (0 === n.indexOf("on") ? u = t[u] : "false" === u ? u = !1 : "true" === u && (u = !0)), f[n] = u)
                }

                ("rtl" === i.dir || u.rightAlign) && (i.style.textAlign = "right");
                ("rtl" === i.dir || u.numericInput) && (i.dir = "ltr", i.removeAttribute("dir"), u.isRTL = !0);
                var a, o, s, h, l = i.getAttribute(e);
                if (l && "" !== l && (l = l.replace(new RegExp("'", "g"), '"'), o = JSON.parse("{" + l + "}")), o) {
                    s = r;
                    for (h in o) if ("alias" === h.toLowerCase()) {
                        s = o[h];
                        break
                    }
                }
                v("alias", s);
                f.alias && c(f.alias, f, u);
                for (a in u) {
                    if (o) {
                        s = r;
                        for (h in o) if (h.toLowerCase() === a.toLowerCase()) {
                            s = o[h];
                            break
                        }
                    }
                    v(a, s)
                }
                return n.extend(!0, u, f), u
            }

            var s = this;
            return "string" == typeof o && (o = i.getElementById(o) || i.querySelectorAll(o)), o = o.nodeName ? [o] : o, n.each(o, function (t, i) {
                var o = n.extend(!0, {}, s.opts), c;
                h(i, o, n.extend(!0, {}, s.userOptions), s.dataAttribute);
                c = e(o, s.noMasksCache);
                c !== r && (i.inputmask !== r && i.inputmask.remove(), i.inputmask = new u(r, r, !0), i.inputmask.opts = o, i.inputmask.noMasksCache = s.noMasksCache, i.inputmask.userOptions = n.extend(!0, {}, s.userOptions), i.inputmask.isRTL = o.isRTL, i.inputmask.el = i, i.inputmask.maskset = c, n.data(i, "_inputmask_opts", o), f.call(i.inputmask, {action: "mask"}))
            }), o && o[0] ? o[0].inputmask || this : this
        },
        option: function (t, i) {
            return "string" == typeof t ? this.opts[t] : "object" == typeof t ? (n.extend(this.userOptions, t), this.el && !0 !== i && this.mask(this.el), this) : void 0
        },
        unmaskedvalue: function (n) {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {
                action: "unmaskedvalue",
                value: n
            })
        },
        remove: function () {
            return f.call(this, {action: "remove"})
        },
        getemptymask: function () {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {action: "getemptymask"})
        },
        hasMaskedValue: function () {
            return !this.opts.autoUnmask
        },
        isComplete: function () {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {action: "isComplete"})
        },
        getmetadata: function () {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {action: "getmetadata"})
        },
        isValid: function (n) {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {
                action: "isValid",
                value: n
            })
        },
        format: function (n, t) {
            return this.maskset = this.maskset || e(this.opts, this.noMasksCache), f.call(this, {
                action: "format",
                value: n,
                metadata: t
            })
        },
        analyseMask: function (t, i, f) {
            function v(n, t, i, r) {
                this.matches = [];
                this.openGroup = n || !1;
                this.alternatorGroup = !1;
                this.isGroup = n || !1;
                this.isOptional = t || !1;
                this.isQuantifier = i || !1;
                this.isAlternator = r || !1;
                this.quantifier = {min: 1, max: 1}
            }

            function d(t, e, o) {
                var h, s;
                if (o = o !== r ? o : t.matches.length, h = t.matches[o - 1], i) 0 === e.indexOf("[") || b ? t.matches.splice(o++, 0, {
                    fn: new RegExp(e, f.casing ? "i" : ""),
                    cardinality: 1,
                    optionality: t.isOptional,
                    newBlockMarker: h === r || h.def !== e,
                    casing: null,
                    def: e,
                    placeholder: r,
                    nativeDef: e
                }) : n.each(e.split(""), function (n, i) {
                    h = t.matches[o - 1];
                    t.matches.splice(o++, 0, {
                        fn: null,
                        cardinality: 0,
                        optionality: t.isOptional,
                        newBlockMarker: h === r || h.def !== i && null !== h.fn,
                        casing: null,
                        def: f.staticDefinitionSymbol || i,
                        placeholder: f.staticDefinitionSymbol !== r ? i : r,
                        nativeDef: i
                    })
                }), b = !1; else if (s = (f.definitions ? f.definitions[e] : r) || u.prototype.definitions[e], s && !b) {
                    for (var a = s.prevalidator, y = a ? a.length : 0, c = 1; c < s.cardinality; c++) {
                        var v = y >= c ? a[c - 1] : [], l = v.validator, p = v.cardinality;
                        t.matches.splice(o++, 0, {
                            fn: l ? "string" == typeof l ? new RegExp(l, f.casing ? "i" : "") : new function () {
                                this.test = l
                            } : new RegExp("."),
                            cardinality: p || 1,
                            optionality: t.isOptional,
                            newBlockMarker: h === r || h.def !== (s.definitionSymbol || e),
                            casing: s.casing,
                            def: s.definitionSymbol || e,
                            placeholder: s.placeholder,
                            nativeDef: e
                        });
                        h = t.matches[o - 1]
                    }
                    t.matches.splice(o++, 0, {
                        fn: s.validator ? "string" == typeof s.validator ? new RegExp(s.validator, f.casing ? "i" : "") : new function () {
                            this.test = s.validator
                        } : new RegExp("."),
                        cardinality: s.cardinality,
                        optionality: t.isOptional,
                        newBlockMarker: h === r || h.def !== (s.definitionSymbol || e),
                        casing: s.casing,
                        def: s.definitionSymbol || e,
                        placeholder: s.placeholder,
                        nativeDef: e
                    })
                } else t.matches.splice(o++, 0, {
                    fn: null,
                    cardinality: 0,
                    optionality: t.isOptional,
                    newBlockMarker: h === r || h.def !== e && null !== h.fn,
                    casing: null,
                    def: f.staticDefinitionSymbol || e,
                    placeholder: f.staticDefinitionSymbol !== r ? e : r,
                    nativeDef: e
                }), b = !1
            }

            function ot(t) {
                t && t.matches && n.each(t.matches, function (n, u) {
                    var e = t.matches[n + 1];
                    (e === r || e.matches === r || !1 === e.isQuantifier) && u && u.isGroup && (u.isGroup = !1, i || (d(u, f.groupmarker.start, 0), !0 !== u.openGroup && d(u, f.groupmarker.end)));
                    ot(u)
                })
            }

            function g() {
                if (e.length > 0) {
                    if (o = e[e.length - 1], d(o, l), o.isAlternator) {
                        s = e.pop();
                        for (var n = 0; n < s.matches.length; n++) s.matches[n].isGroup = !1;
                        e.length > 0 ? (o = e[e.length - 1], o.matches.push(s)) : c.matches.push(s)
                    }
                } else d(c, l)
            }

            function st(n) {
                var t, i, u;
                n.matches = n.matches.reverse();
                for (t in n.matches) n.matches.hasOwnProperty(t) && (i = parseInt(t), n.matches[t].isQuantifier && n.matches[i + 1] && n.matches[i + 1].isGroup && (u = n.matches[t], n.matches.splice(t, 1), n.matches.splice(i + 1, 0, u)), n.matches[t] = n.matches[t].matches !== r ? st(n.matches[t]) : function (n) {
                    return n === f.optionalmarker.start ? n = f.optionalmarker.end : n === f.optionalmarker.end ? n = f.optionalmarker.start : n === f.groupmarker.start ? n = f.groupmarker.end : n === f.groupmarker.end && (n = f.groupmarker.start), n
                }(n.matches[t]));
                return n
            }

            var h, l, y, o, s, a, w, ht = /(?:[?*+]|\{[0-9\+\*]+(?:,[0-9\+\*]*)?\})|[^.?*+^${[]()|\\]+|./g,
                ct = /\[\^?]?(?:[^\\\]]+|\\[\S\s]?)*]?|\\(?:0(?:[0-3][0-7]{0,2}|[4-7][0-7]?)?|[1-9][0-9]*|x[0-9A-Fa-f]{2}|u[0-9A-Fa-f]{4}|c[A-Za-z]|[\S\s]?)|\((?:\?[:=!]?)?|(?:[?*+]|\{[0-9]+(?:,[0-9]*)?\})\??|[^.?*+^${[()|\\]+|./g,
                b = !1, c = new v, e = [], ut = [], k, nt, it, rt, et;
            for (i && (f.optionalmarker.start = r, f.optionalmarker.end = r); h = i ? ct.exec(t) : ht.exec(t);) {
                if (l = h[0], i) switch (l.charAt(0)) {
                    case"?":
                        l = "{0,1}";
                        break;
                    case"+":
                    case"*":
                        l = "{" + l + "}"
                }
                if (b) g(); else switch (l.charAt(0)) {
                    case f.escapeChar:
                        b = !0;
                        i && g();
                        break;
                    case f.optionalmarker.end:
                    case f.groupmarker.end:
                        if (y = e.pop(), y.openGroup = !1, y !== r) if (e.length > 0) {
                            if (o = e[e.length - 1], o.matches.push(y), o.isAlternator) {
                                for (s = e.pop(), k = 0; k < s.matches.length; k++) s.matches[k].isGroup = !1, s.matches[k].alternatorGroup = !1;
                                e.length > 0 ? (o = e[e.length - 1], o.matches.push(s)) : c.matches.push(s)
                            }
                        } else c.matches.push(y); else g();
                        break;
                    case f.optionalmarker.start:
                        e.push(new v(!1, !0));
                        break;
                    case f.groupmarker.start:
                        e.push(new v(!0));
                        break;
                    case f.quantifiermarker.start:
                        nt = new v(!1, !1, !0);
                        l = l.replace(/[{}]/g, "");
                        var p = l.split(","), ft = isNaN(p[0]) ? p[0] : parseInt(p[0]),
                            tt = 1 === p.length ? ft : isNaN(p[1]) ? p[1] : parseInt(p[1]);
                        ("*" !== tt && "+" !== tt || (ft = "*" === tt ? 0 : 1), nt.quantifier = {
                            min: ft,
                            max: tt
                        }, e.length > 0) ? (it = e[e.length - 1].matches, h = it.pop(), h.isGroup || (w = new v(!0), w.matches.push(h), h = w), it.push(h), it.push(nt)) : (h = c.matches.pop(), h.isGroup || (w = new v(!0), w.matches.push(h), h = w), c.matches.push(h), c.matches.push(nt));
                        break;
                    case f.alternatormarker:
                        e.length > 0 ? (o = e[e.length - 1], rt = o.matches[o.matches.length - 1], a = o.openGroup && (rt.matches === r || !1 === rt.isGroup && !1 === rt.isAlternator) ? e.pop() : o.matches.pop()) : a = c.matches.pop();
                        a.isAlternator ? e.push(a) : (a.alternatorGroup ? (s = e.pop(), a.alternatorGroup = !1) : s = new v(!1, !1, !1, !0), s.matches.push(a), e.f.typepush(s), a.openGroup) && (a.openGroup = !1, et = new v(!0), et.alternatorGroup = !0, e.push(et));
                        break;
                    default:
                        g()
                }
            }
            for (; e.length > 0;) y = e.pop(), c.matches.push(y);
            return c.matches.length > 0 && (ot(c), ut.push(c)), (f.numericInput || f.isRTL) && st(ut[0]), ut
        }
    }, u.extendDefaults = function (t) {
        n.extend(!0, u.prototype.defaults, t)
    }, u.extendDefinitions = function (t) {
        n.extend(!0, u.prototype.definitions, t)
    }, u.extendAliases = function (t) {
        n.extend(!0, u.prototype.aliases, t)
    }, u.format = function (n, t, i) {
        return u(t).format(n, i)
    }, u.unmask = function (n, t) {
        return u(t).unmaskedvalue(n)
    }, u.isValid = function (n, t) {
        return u(t).isValid(n)
    }, u.remove = function (t) {
        n.each(t, function (n, t) {
            t.inputmask && t.inputmask.remove()
        })
    }, u.escapeRegex = function (n) {
        return n.replace(new RegExp("(\\/|\\.|\\*|\\+|\\?|\\||\\(|\\)|\\[|\\]|\\{|\\}|\\\\|\\$|\\^)", "gim"), "\\$1")
    }, u.keyCode = {
        ALT: 18,
        BACKSPACE: 8,
        BACKSPACE_SAFARI: 127,
        CAPS_LOCK: 20,
        COMMA: 188,
        COMMAND: 91,
        COMMAND_LEFT: 91,
        COMMAND_RIGHT: 93,
        CONTROL: 17,
        DELETE: 46,
        DOWN: 40,
        END: 35,
        ENTER: 13,
        ESCAPE: 27,
        HOME: 36,
        INSERT: 45,
        LEFT: 37,
        MENU: 93,
        NUMPAD_ADD: 107,
        NUMPAD_DECIMAL: 110,
        NUMPAD_DIVIDE: 111,
        NUMPAD_ENTER: 108,
        NUMPAD_MULTIPLY: 106,
        NUMPAD_SUBTRACT: 109,
        PAGE_DOWN: 34,
        PAGE_UP: 33,
        PERIOD: 190,
        RIGHT: 39,
        SHIFT: 16,
        SPACE: 32,
        TAB: 9,
        UP: 38,
        WINDOWS: 91,
        X: 88
    }, u
});
!function (n) {
    "function" == typeof define && define.amd ? define(["jquery", "./inputmask"], n) : "object" == typeof exports ? module.exports = n(require("jquery"), require("./inputmask")) : n(jQuery, window.Inputmask)
}(function (n, t) {
    return void 0 === n.fn.inputmask && (n.fn.inputmask = function (i, r) {
        var f, u = this[0];
        if (void 0 === r && (r = {}), "string" == typeof i) switch (i) {
            case"unmaskedvalue":
                return u && u.inputmask ? u.inputmask.unmaskedvalue() : n(u).val();
            case"remove":
                return this.each(function () {
                    this.inputmask && this.inputmask.remove()
                });
            case"getemptymask":
                return u && u.inputmask ? u.inputmask.getemptymask() : "";
            case"hasMaskedValue":
                return !(!u || !u.inputmask) && u.inputmask.hasMaskedValue();
            case"isComplete":
                return !u || !u.inputmask || u.inputmask.isComplete();
            case"getmetadata":
                return u && u.inputmask ? u.inputmask.getmetadata() : void 0;
            case"setvalue":
                n(u).val(r);
                u && void 0 === u.inputmask && n(u).triggerHandler("setvalue");
                break;
            case"option":
                if ("string" != typeof r) return this.each(function () {
                    if (void 0 !== this.inputmask) return this.inputmask.option(r)
                });
                if (u && void 0 !== u.inputmask) return u.inputmask.option(r);
                break;
            default:
                return r.alias = i, f = new t(r), this.each(function () {
                    f.mask(this)
                })
        } else {
            if ("object" == typeof i) return f = new t(i), void 0 === i.mask && void 0 === i.alias ? this.each(function () {
                if (void 0 !== this.inputmask) return this.inputmask.option(i);
                f.mask(this)
            }) : this.each(function () {
                f.mask(this)
            });
            if (void 0 === i) return this.each(function () {
                f = new t(r);
                f.mask(this)
            })
        }
    }), n.fn.inputmask
});
!function (n) {
    "function" == typeof define && define.amd ? define(["./dependencyLibs/inputmask.dependencyLib", "./inputmask"], n) : "object" == typeof exports ? module.exports = n(require("./dependencyLibs/inputmask.dependencyLib"), require("./inputmask")) : n(window.dependencyLib || jQuery, window.Inputmask)
}(function (n, t) {
    return t.extendDefinitions({
        A: {validator: "[A-Za-zА-яЁёÀ-ÿµ]", cardinality: 1, casing: "upper"},
        "&": {validator: "[0-9A-Za-zА-яЁёÀ-ÿµ]", cardinality: 1, casing: "upper"},
        "#": {validator: "[0-9A-Fa-f]", cardinality: 1, casing: "upper"}
    }), t.extendAliases({
        url: {
            definitions: {i: {validator: ".", cardinality: 1}},
            mask: "(\\http://)|(\\http\\s://)|(ftp://)|(ftp\\s://)i{+}",
            insertMode: !1,
            autoUnmask: !1,
            inputmode: "url"
        },
        ip: {
            mask: "i[i[i]].i[i[i]].i[i[i]].i[i[i]]", definitions: {
                i: {
                    validator: function (n, t, i) {
                        return i - 1 > -1 && "." !== t.buffer[i - 1] ? (n = t.buffer[i - 1] + n, n = i - 2 > -1 && "." !== t.buffer[i - 2] ? t.buffer[i - 2] + n : "0" + n) : n = "00" + n, new RegExp("25[0-5]|2[0-4][0-9]|[01][0-9][0-9]").test(n)
                    }, cardinality: 1
                }
            }, onUnMask: function (n) {
                return n
            }, inputmode: "numeric"
        },
        email: {
            mask: "*{1,64}[.*{1,64}][.*{1,64}][.*{1,63}]@-{1,63}.-{1,63}[.-{1,63}][.-{1,63}]",
            greedy: !1,
            onBeforePaste: function (n) {
                return n = n.toLowerCase(), n.replace("mailto:", "")
            },
            definitions: {
                "*": {validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~-]", cardinality: 1, casing: "lower"},
                "-": {validator: "[0-9A-Za-z-]", cardinality: 1, casing: "lower"}
            },
            onUnMask: function (n) {
                return n
            },
            inputmode: "email"
        },
        mac: {mask: "##:##:##:##:##:##"},
        vin: {
            mask: "V{13}9{4}",
            definitions: {V: {validator: "[A-HJ-NPR-Za-hj-npr-z\\d]", cardinality: 1, casing: "upper"}},
            clearIncomplete: !0,
            autoUnmask: !0
        }
    }), t
});
!function (n) {
    "function" == typeof define && define.amd ? define(["./dependencyLibs/inputmask.dependencyLib", "./inputmask"], n) : "object" == typeof exports ? module.exports = n(require("./dependencyLibs/inputmask.dependencyLib"), require("./inputmask")) : n(window.dependencyLib || jQuery, window.Inputmask)
}(function (n, t) {
    function i(n) {
        return isNaN(n) || 29 === new Date(n, 2, 0).getDate()
    }

    return t.extendAliases({
        "dd/mm/yyyy": {
            mask: "1/2/y",
            placeholder: "dd/mm/yyyy",
            regex: {
                val1pre: new RegExp("[0-3]"), val1: new RegExp("0[1-9]|[12][0-9]|3[01]"), val2pre: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|[12][0-9]|3[01])" + i + "[01])")
                }, val2: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|[12][0-9])" + i + "(0[1-9]|1[012]))|(30" + i + "(0[13-9]|1[012]))|(31" + i + "(0[13578]|1[02]))")
                }
            },
            leapday: "29/02/",
            separator: "/",
            yearrange: {minyear: 1900, maxyear: 2099},
            isInYearRange: function (n, t, i) {
                if (isNaN(n)) return !1;
                var r = parseInt(n.concat(t.toString().slice(n.length))),
                    u = parseInt(n.concat(i.toString().slice(n.length)));
                return !isNaN(r) && t <= r && r <= i || !isNaN(u) && t <= u && u <= i
            },
            determinebaseyear: function (n, t, i) {
                var r = (new Date).getFullYear(), u, s, e, f, o;
                if (n > r) return n;
                if (t < r) {
                    for (u = t.toString().slice(0, 2), s = t.toString().slice(2, 4); t < u + i;) u--;
                    return e = u + s, n > e ? n : e
                }
                if (n <= r && r <= t) {
                    for (f = r.toString().slice(0, 2); t < f + i;) f--;
                    return o = f + i, o < n ? n : o
                }
                return r
            },
            onKeyDown: function (i) {
                var u = n(this), r;
                i.ctrlKey && i.keyCode === t.keyCode.RIGHT && (r = new Date, u.val(r.getDate().toString() + (r.getMonth() + 1).toString() + r.getFullYear().toString()), u.trigger("setvalue"))
            },
            getFrontValue: function (n, t, i) {
                for (var f, e = 0, r = 0, u = 0; u < n.length && "2" !== n.charAt(u); u++) f = i.definitions[n.charAt(u)], f ? (e += r, r = f.cardinality) : r++;
                return t.join("").substr(e, r)
            },
            postValidation: function (n, t, r) {
                var f, e, u = n.join("");
                return 0 === r.mask.indexOf("y") ? (e = u.substr(0, 4), f = u.substring(4, 10)) : (e = u.substring(6, 10), f = u.substr(0, 6)), t && (f !== r.leapday || i(e))
            },
            definitions: {
                "1": {
                    validator: function (n, t, i, r, u) {
                        var f = u.regex.val1.test(n);
                        return r || f || n.charAt(1) !== u.separator && -1 === "-./".indexOf(n.charAt(1)) || !(f = u.regex.val1.test("0" + n.charAt(0))) ? f : (t.buffer[i - 1] = "0", {
                            refreshFromBuffer: {
                                start: i - 1,
                                end: i
                            }, pos: i, c: n.charAt(0)
                        })
                    }, cardinality: 2, prevalidator: [{
                        validator: function (n, t, i, r, u) {
                            var e = n, f;
                            if (isNaN(t.buffer[i + 1]) || (e += t.buffer[i + 1]), f = 1 === e.length ? u.regex.val1pre.test(e) : u.regex.val1.test(e), !r && !f) {
                                if (f = u.regex.val1.test(n + "0")) return t.buffer[i] = n, t.buffer[++i] = "0", {
                                    pos: i,
                                    c: "0"
                                };
                                if (f = u.regex.val1.test("0" + n)) return t.buffer[i] = "0", i++, {pos: i}
                            }
                            return f
                        }, cardinality: 1
                    }]
                }, "2": {
                    validator: function (n, t, i, r, u) {
                        var f = u.getFrontValue(t.mask, t.buffer, u), e;
                        return -1 !== f.indexOf(u.placeholder[0]) && (f = "01" + u.separator), e = u.regex.val2(u.separator).test(f + n), r || e || n.charAt(1) !== u.separator && -1 === "-./".indexOf(n.charAt(1)) || !(e = u.regex.val2(u.separator).test(f + "0" + n.charAt(0))) ? e : (t.buffer[i - 1] = "0", {
                            refreshFromBuffer: {
                                start: i - 1,
                                end: i
                            }, pos: i, c: n.charAt(0)
                        })
                    }, cardinality: 2, prevalidator: [{
                        validator: function (n, t, i, r, u) {
                            var f, e;
                            return isNaN(t.buffer[i + 1]) || (n += t.buffer[i + 1]), f = u.getFrontValue(t.mask, t.buffer, u), -1 !== f.indexOf(u.placeholder[0]) && (f = "01" + u.separator), e = 1 === n.length ? u.regex.val2pre(u.separator).test(f + n) : u.regex.val2(u.separator).test(f + n), r || e || !(e = u.regex.val2(u.separator).test(f + "0" + n)) ? e : (t.buffer[i] = "0", i++, {pos: i})
                        }, cardinality: 1
                    }]
                }, y: {
                    validator: function (n, t, i, r, u) {
                        return u.isInYearRange(n, u.yearrange.minyear, u.yearrange.maxyear)
                    }, cardinality: 4, prevalidator: [{
                        validator: function (n, t, i, r, u) {
                            var e = u.isInYearRange(n, u.yearrange.minyear, u.yearrange.maxyear), f;
                            if (!r && !e) {
                                if (f = u.determinebaseyear(u.yearrange.minyear, u.yearrange.maxyear, n + "0").toString().slice(0, 1), e = u.isInYearRange(f + n, u.yearrange.minyear, u.yearrange.maxyear)) return t.buffer[i++] = f.charAt(0), {pos: i};
                                if (f = u.determinebaseyear(u.yearrange.minyear, u.yearrange.maxyear, n + "0").toString().slice(0, 2), e = u.isInYearRange(f + n, u.yearrange.minyear, u.yearrange.maxyear)) return t.buffer[i++] = f.charAt(0), t.buffer[i++] = f.charAt(1), {pos: i}
                            }
                            return e
                        }, cardinality: 1
                    }, {
                        validator: function (n, t, i, r, u) {
                            var e = u.isInYearRange(n, u.yearrange.minyear, u.yearrange.maxyear), f;
                            if (!r && !e) {
                                if (f = u.determinebaseyear(u.yearrange.minyear, u.yearrange.maxyear, n).toString().slice(0, 2), e = u.isInYearRange(n[0] + f[1] + n[1], u.yearrange.minyear, u.yearrange.maxyear)) return t.buffer[i++] = f.charAt(1), {pos: i};
                                if (f = u.determinebaseyear(u.yearrange.minyear, u.yearrange.maxyear, n).toString().slice(0, 2), e = u.isInYearRange(f + n, u.yearrange.minyear, u.yearrange.maxyear)) return t.buffer[i - 1] = f.charAt(0), t.buffer[i++] = f.charAt(1), t.buffer[i++] = n.charAt(0), {
                                    refreshFromBuffer: {
                                        start: i - 3,
                                        end: i
                                    }, pos: i
                                }
                            }
                            return e
                        }, cardinality: 2
                    }, {
                        validator: function (n, t, i, r, u) {
                            return u.isInYearRange(n, u.yearrange.minyear, u.yearrange.maxyear)
                        }, cardinality: 3
                    }]
                }
            },
            insertMode: !1,
            autoUnmask: !1
        },
        "mm/dd/yyyy": {
            placeholder: "mm/dd/yyyy", alias: "dd/mm/yyyy", regex: {
                val2pre: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[13-9]|1[012])" + i + "[0-3])|(02" + i + "[0-2])")
                }, val2: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|1[012])" + i + "(0[1-9]|[12][0-9]))|((0[13-9]|1[012])" + i + "30)|((0[13578]|1[02])" + i + "31)")
                }, val1pre: new RegExp("[01]"), val1: new RegExp("0[1-9]|1[012]")
            }, leapday: "02/29/", onKeyDown: function (i) {
                var u = n(this), r;
                i.ctrlKey && i.keyCode === t.keyCode.RIGHT && (r = new Date, u.val((r.getMonth() + 1).toString() + r.getDate().toString() + r.getFullYear().toString()), u.trigger("setvalue"))
            }
        },
        "yyyy/mm/dd": {
            mask: "y/1/2",
            placeholder: "yyyy/mm/dd",
            alias: "mm/dd/yyyy",
            leapday: "/02/29",
            onKeyDown: function (i) {
                var u = n(this), r;
                i.ctrlKey && i.keyCode === t.keyCode.RIGHT && (r = new Date, u.val(r.getFullYear().toString() + (r.getMonth() + 1).toString() + r.getDate().toString()), u.trigger("setvalue"))
            }
        },
        "dd.mm.yyyy": {
            mask: "1.2.y",
            placeholder: "dd.mm.yyyy",
            leapday: "29.02.",
            separator: ".",
            alias: "dd/mm/yyyy"
        },
        "dd-mm-yyyy": {
            mask: "1-2-y",
            placeholder: "dd-mm-yyyy",
            leapday: "29-02-",
            separator: "-",
            alias: "dd/mm/yyyy"
        },
        "mm.dd.yyyy": {
            mask: "1.2.y",
            placeholder: "mm.dd.yyyy",
            leapday: "02.29.",
            separator: ".",
            alias: "mm/dd/yyyy"
        },
        "mm-dd-yyyy": {
            mask: "1-2-y",
            placeholder: "mm-dd-yyyy",
            leapday: "02-29-",
            separator: "-",
            alias: "mm/dd/yyyy"
        },
        "yyyy.mm.dd": {
            mask: "y.1.2",
            placeholder: "yyyy.mm.dd",
            leapday: ".02.29",
            separator: ".",
            alias: "yyyy/mm/dd"
        },
        "yyyy-mm-dd": {
            mask: "y-1-2",
            placeholder: "yyyy-mm-dd",
            leapday: "-02-29",
            separator: "-",
            alias: "yyyy/mm/dd"
        },
        datetime: {
            mask: "1/2/y h:s",
            placeholder: "dd/mm/yyyy hh:mm",
            alias: "dd/mm/yyyy",
            regex: {
                hrspre: new RegExp("[012]"),
                hrs24: new RegExp("2[0-4]|1[3-9]"),
                hrs: new RegExp("[01][0-9]|2[0-4]"),
                ampm: new RegExp("^[a|p|A|P][m|M]"),
                mspre: new RegExp("[0-5]"),
                ms: new RegExp("[0-5][0-9]")
            },
            timeseparator: ":",
            hourFormat: "24",
            definitions: {
                h: {
                    validator: function (n, t, i, r, u) {
                        var e, f;
                        return "24" === u.hourFormat && 24 === parseInt(n, 10) ? (t.buffer[i - 1] = "0", t.buffer[i] = "0", {
                            refreshFromBuffer: {
                                start: i - 1,
                                end: i
                            }, c: "0"
                        }) : (e = u.regex.hrs.test(n), !r && !e && (n.charAt(1) === u.timeseparator || -1 !== "-.:".indexOf(n.charAt(1))) && (e = u.regex.hrs.test("0" + n.charAt(0)))) ? (t.buffer[i - 1] = "0", t.buffer[i] = n.charAt(0), i++, {
                            refreshFromBuffer: {
                                start: i - 2,
                                end: i
                            }, pos: i, c: u.timeseparator
                        }) : e && "24" !== u.hourFormat && u.regex.hrs24.test(n) ? (f = parseInt(n, 10), 24 === f ? (t.buffer[i + 5] = "a", t.buffer[i + 6] = "m") : (t.buffer[i + 5] = "p", t.buffer[i + 6] = "m"), f -= 12, f < 10 ? (t.buffer[i] = f.toString(), t.buffer[i - 1] = "0") : (t.buffer[i] = f.toString().charAt(1), t.buffer[i - 1] = f.toString().charAt(0)), {
                            refreshFromBuffer: {
                                start: i - 1,
                                end: i + 6
                            }, c: t.buffer[i]
                        }) : e
                    }, cardinality: 2, prevalidator: [{
                        validator: function (n, t, i, r, u) {
                            var f = u.regex.hrspre.test(n);
                            return r || f || !(f = u.regex.hrs.test("0" + n)) ? f : (t.buffer[i] = "0", i++, {pos: i})
                        }, cardinality: 1
                    }]
                }, s: {
                    validator: "[0-5][0-9]", cardinality: 2, prevalidator: [{
                        validator: function (n, t, i, r, u) {
                            var f = u.regex.mspre.test(n);
                            return r || f || !(f = u.regex.ms.test("0" + n)) ? f : (t.buffer[i] = "0", i++, {pos: i})
                        }, cardinality: 1
                    }]
                }, t: {
                    validator: function (n, t, i, r, u) {
                        return u.regex.ampm.test(n + "m")
                    }, casing: "lower", cardinality: 1
                }
            },
            insertMode: !1,
            autoUnmask: !1
        },
        datetime12: {mask: "1/2/y h:s t\\m", placeholder: "dd/mm/yyyy hh:mm xm", alias: "datetime", hourFormat: "12"},
        "mm/dd/yyyy hh:mm xm": {
            mask: "1/2/y h:s t\\m",
            placeholder: "mm/dd/yyyy hh:mm xm",
            alias: "datetime12",
            regex: {
                val2pre: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[13-9]|1[012])" + i + "[0-3])|(02" + i + "[0-2])")
                }, val2: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|1[012])" + i + "(0[1-9]|[12][0-9]))|((0[13-9]|1[012])" + i + "30)|((0[13578]|1[02])" + i + "31)")
                }, val1pre: new RegExp("[01]"), val1: new RegExp("0[1-9]|1[012]")
            },
            leapday: "02/29/",
            onKeyDown: function (i) {
                var u = n(this), r;
                i.ctrlKey && i.keyCode === t.keyCode.RIGHT && (r = new Date, u.val((r.getMonth() + 1).toString() + r.getDate().toString() + r.getFullYear().toString()), u.trigger("setvalue"))
            }
        },
        "hh:mm t": {mask: "h:s t\\m", placeholder: "hh:mm xm", alias: "datetime", hourFormat: "12"},
        "h:s t": {mask: "h:s t\\m", placeholder: "hh:mm xm", alias: "datetime", hourFormat: "12"},
        "hh:mm:ss": {mask: "h:s:s", placeholder: "hh:mm:ss", alias: "datetime", autoUnmask: !1},
        "hh:mm": {mask: "h:s", placeholder: "hh:mm", alias: "datetime", autoUnmask: !1},
        date: {alias: "dd/mm/yyyy"},
        "mm/yyyy": {mask: "1/y", placeholder: "mm/yyyy", leapday: "donotuse", separator: "/", alias: "mm/dd/yyyy"},
        "MM/YY": {
            mask: "M/Y",
            placeholder: "MM/YY",
            leapday: "donotuse",
            alias: "mm/dd/yyyy",
            definitions: {
                M: {
                    validator: "0[1-9]|1[012]",
                    cardinality: 2,
                    placeholder: "М",
                    prevalidator: [{
                        validator: function (n, t, i) {
                            var r = new RegExp("[0-9]");
                            return r.test(n) ? n > "1" ? (t.buffer[i] = "0", {pos: i + 1, c: n}) : !0 : !1
                        }, cardinality: 1
                    }]
                }, Y: {validator: "\\d{2}", cardinality: 2, placeholder: "Г"}
            }
        },
        "mm.yyyy": {mask: "1.y", placeholder: "mm.yyyy", leapday: "donotuse", separator: ".", alias: "mm/dd/yyyy"},
        shamsi: {
            regex: {
                val2pre: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|1[012])" + i + "[0-3])")
                }, val2: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|1[012])" + i + "(0[1-9]|[12][0-9]))|((0[1-9]|1[012])" + i + "30)|((0[1-6])" + i + "31)")
                }, val1pre: new RegExp("[01]"), val1: new RegExp("0[1-9]|1[012]")
            },
            yearrange: {minyear: 1300, maxyear: 1499},
            mask: "y/1/2",
            leapday: "/12/30",
            placeholder: "yyyy/mm/dd",
            alias: "mm/dd/yyyy",
            clearIncomplete: !0
        },
        "yyyy-mm-dd hh:mm:ss": {
            mask: "y-1-2 h:s:s",
            placeholder: "yyyy-mm-dd hh:mm:ss",
            alias: "datetime",
            separator: "-",
            leapday: "-02-29",
            regex: {
                val2pre: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[13-9]|1[012])" + i + "[0-3])|(02" + i + "[0-2])")
                }, val2: function (n) {
                    var i = t.escapeRegex.call(this, n);
                    return new RegExp("((0[1-9]|1[012])" + i + "(0[1-9]|[12][0-9]))|((0[13-9]|1[012])" + i + "30)|((0[13578]|1[02])" + i + "31)")
                }, val1pre: new RegExp("[01]"), val1: new RegExp("0[1-9]|1[012]")
            },
            onKeyDown: function () {
            }
        }
    }), t
});
!function (n) {
    "function" == typeof define && define.amd ? define(["./dependencyLibs/inputmask.dependencyLib", "./inputmask"], n) : "object" == typeof exports ? module.exports = n(require("./dependencyLibs/inputmask.dependencyLib"), require("./inputmask")) : n(window.dependencyLib || jQuery, window.Inputmask)
}(function (n, t, i) {
    function r(n, i) {
        for (var u = "", r = 0; r < n.length; r++) u += t.prototype.definitions[n.charAt(r)] || i.definitions[n.charAt(r)] || i.optionalmarker.start === n.charAt(r) || i.optionalmarker.end === n.charAt(r) || i.quantifiermarker.start === n.charAt(r) || i.quantifiermarker.end === n.charAt(r) || i.groupmarker.start === n.charAt(r) || i.groupmarker.end === n.charAt(r) || i.alternatormarker === n.charAt(r) ? "\\" + n.charAt(r) : n.charAt(r);
        return u
    }

    return t.extendAliases({
        numeric: {
            mask: function (n) {
                var f, e, t, u;
                return (0 !== n.repeat && isNaN(n.integerDigits) && (n.integerDigits = n.repeat), n.repeat = 0, n.groupSeparator === n.radixPoint && (n.groupSeparator = "." === n.radixPoint ? "," : "," === n.radixPoint ? "." : ""), " " === n.groupSeparator && (n.skipOptionalPartCharacter = i), n.autoGroup = n.autoGroup && "" !== n.groupSeparator, n.autoGroup && ("string" == typeof n.groupSize && isFinite(n.groupSize) && (n.groupSize = parseInt(n.groupSize)), isFinite(n.integerDigits))) && (f = Math.floor(n.integerDigits / n.groupSize), e = n.integerDigits % n.groupSize, n.integerDigits = parseInt(n.integerDigits) + (0 === e ? f - 1 : f), n.integerDigits < 1 && (n.integerDigits = "*")), n.placeholder.length > 1 && (n.placeholder = n.placeholder.charAt(0)), "radixFocus" === n.positionCaretOnClick && "" === n.placeholder && !1 === n.integerOptional && (n.positionCaretOnClick = "lvp"), n.definitions[";"] = n.definitions["~"], n.definitions[";"].definitionSymbol = "~", !0 === n.numericInput && (n.positionCaretOnClick = "radixFocus" === n.positionCaretOnClick ? "lvp" : n.positionCaretOnClick, n.digitsOptional = !1, isNaN(n.digits) && (n.digits = 2), n.decimalProtect = !1), t = "[+]", (t += r(n.prefix, n), t += !0 === n.integerOptional ? "~{1," + n.integerDigits + "}" : "~{" + n.integerDigits + "}", n.digits !== i) && (n.radixPointDefinitionSymbol = n.decimalProtect ? ":" : n.radixPoint, u = n.digits.toString().split(","), isFinite(u[0] && u[1] && isFinite(u[1])) ? t += n.radixPointDefinitionSymbol + ";{" + n.digits + "}" : (isNaN(n.digits) || parseInt(n.digits) > 0) && (t += n.digitsOptional ? "[" + n.radixPointDefinitionSymbol + ";{1," + n.digits + "}]" : n.radixPointDefinitionSymbol + ";{" + n.digits + "}")), t += r(n.suffix, n), t += "[-]", n.greedy = !1, t
            },
            placeholder: "",
            greedy: !1,
            digits: "*",
            digitsOptional: !0,
            enforceDigitsOnBlur: !1,
            radixPoint: ".",
            positionCaretOnClick: "radixFocus",
            groupSize: 3,
            groupSeparator: "",
            autoGroup: !1,
            allowMinus: !0,
            negationSymbol: {front: "-", back: ""},
            integerDigits: "+",
            integerOptional: !0,
            prefix: "",
            suffix: "",
            rightAlign: !0,
            decimalProtect: !0,
            min: null,
            max: null,
            step: 1,
            insertMode: !0,
            autoUnmask: !1,
            unmaskAsNumber: !1,
            inputmode: "numeric",
            preValidation: function (t, r, u, f, e) {
                if ("-" === u || u == e.negationSymbol.front) return !0 === e.allowMinus && (e.isNegative = e.isNegative === i || !e.isNegative, "" === t.join("") || {
                    caret: r,
                    dopost: !0
                });
                if (!1 === f && u === e.radixPoint && e.digits !== i && (isNaN(e.digits) || parseInt(e.digits) > 0)) {
                    var o = n.inArray(e.radixPoint, t);
                    if (-1 !== o) return !0 === e.numericInput ? r === o : {caret: o + 1}
                }
                return !0
            },
            postValidation: function (r, u, f) {
                var a = f.suffix.split(""), v = f.prefix.split(""), o, h, s, e, l, y, c, p, w;
                if (u.pos == i && u.caret !== i && !0 !== u.dopost || (o = u.caret != i ? u.caret : u.pos, h = r.slice(), f.numericInput && (o = h.length - o - 1, h = h.reverse()), s = h[o], s === f.groupSeparator && (o += 1, s = h[o]), o == h.length - f.suffix.length - 1 && s === f.radixPoint)) return u;
                if (s !== i && s !== f.radixPoint && s !== f.negationSymbol.front && s !== f.negationSymbol.back && (h[o] = "?", f.prefix.length > 0 && o >= (!1 === f.isNegative ? 1 : 0) && o < f.prefix.length - 1 + (!1 === f.isNegative ? 1 : 0) ? v[o - (!1 === f.isNegative ? 1 : 0)] = "?" : f.suffix.length > 0 && o >= h.length - f.suffix.length - (!1 === f.isNegative ? 1 : 0) && (a[o - (h.length - f.suffix.length - (!1 === f.isNegative ? 1 : 0))] = "?")), v = v.join(""), a = a.join(""), e = h.join("").replace(v, ""), e = e.replace(a, ""), e = e.replace(new RegExp(t.escapeRegex(f.groupSeparator), "g"), ""), e = e.replace(new RegExp("[-" + t.escapeRegex(f.negationSymbol.front) + "]", "g"), ""), e = e.replace(new RegExp(t.escapeRegex(f.negationSymbol.back) + "$"), ""), isNaN(f.placeholder) && (e = e.replace(new RegExp(t.escapeRegex(f.placeholder), "g"), "")), e.length > 1 && 1 !== e.indexOf(f.radixPoint) && ("0" == s && (e = e.replace(/^\?/g, "")), e = e.replace(/^0/g, "")), e.charAt(0) === f.radixPoint && "" !== f.radixPoint && !0 !== f.numericInput && (e = "0" + e), "" !== e) {
                    if (e = e.split(""), (!f.digitsOptional || f.enforceDigitsOnBlur && "blur" === u.event) && isFinite(f.digits)) for (l = n.inArray(f.radixPoint, e), y = n.inArray(f.radixPoint, h), -1 === l && (e.push(f.radixPoint), l = e.length - 1), c = 1; c <= f.digits; c++) f.digitsOptional && (!f.enforceDigitsOnBlur || "blur" !== u.event) || e[l + c] !== i && e[l + c] !== f.placeholder.charAt(0) ? -1 !== y && h[y + c] !== i && (e[l + c] = e[l + c] || h[y + c]) : e[l + c] = u.placeholder || f.placeholder.charAt(0);
                    !0 !== f.autoGroup || "" === f.groupSeparator || s === f.radixPoint && u.pos === i && !u.dopost ? e = e.join("") : (e = t(function (n, t) {
                        var i = "", r;
                        return (i += "(" + t.groupSeparator + "*{" + t.groupSize + "}){*}", "" !== t.radixPoint) && (r = n.join("").split(t.radixPoint), r[1] && (i += t.radixPoint + "*{" + r[1].match(/^\d*\??\d*/)[0].length + "}")), i
                    }(e, f), {
                        numericInput: !0,
                        jitMasking: !0,
                        definitions: {"*": {validator: "[0-9?]", cardinality: 1}}
                    }).format(e.join("")), e.charAt(0) === f.groupSeparator && e.substr(1))
                }
                return (f.isNegative && "blur" === u.event && (f.isNegative = "0" !== e), e = v + e, e += a, f.isNegative && (e = f.negationSymbol.front + e, e += f.negationSymbol.back), e = e.split(""), s !== i) && (s !== f.radixPoint && s !== f.negationSymbol.front && s !== f.negationSymbol.back ? (o = n.inArray("?", e), o > -1 ? e[o] = s : o = u.caret || 0) : (s === f.radixPoint || s === f.negationSymbol.front || s === f.negationSymbol.back) && (p = n.inArray(s, e), -1 !== p && (o = p))), f.numericInput && (o = e.length - o - 1, e = e.reverse()), w = {
                    caret: s === i || u.pos !== i ? o + (f.numericInput ? -1 : 1) : o,
                    buffer: e,
                    refreshFromBuffer: u.dopost || r.join("") !== e.join("")
                }, w.refreshFromBuffer ? w : u
            },
            onBeforeWrite: function (r, u, f, e) {
                if (r) switch (r.type) {
                    case"keydown":
                        return e.postValidation(u, {caret: f, dopost: !0}, e);
                    case"blur":
                    case"checkval":
                        var o;
                        if (function (n) {
                            n.parseMinMaxOptions === i && (null !== n.min && (n.min = n.min.toString().replace(new RegExp(t.escapeRegex(n.groupSeparator), "g"), ""), "," === n.radixPoint && (n.min = n.min.replace(n.radixPoint, ".")), n.min = isFinite(n.min) ? parseFloat(n.min) : NaN, isNaN(n.min) && (n.min = Number.MIN_VALUE)), null !== n.max && (n.max = n.max.toString().replace(new RegExp(t.escapeRegex(n.groupSeparator), "g"), ""), "," === n.radixPoint && (n.max = n.max.replace(n.radixPoint, ".")), n.max = isFinite(n.max) ? parseFloat(n.max) : NaN, isNaN(n.max) && (n.max = Number.MAX_VALUE)), n.parseMinMaxOptions = "done")
                        }(e), null !== e.min || null !== e.max) {
                            if (o = e.onUnMask(u.join(""), i, n.extend({}, e, {unmaskAsNumber: !0})), null !== e.min && o < e.min) return e.isNegative = e.min < 0, e.postValidation(e.min.toString().replace(".", e.radixPoint).split(""), {
                                caret: f,
                                dopost: !0,
                                placeholder: "0"
                            }, e);
                            if (null !== e.max && o > e.max) return e.isNegative = e.max < 0, e.postValidation(e.max.toString().replace(".", e.radixPoint).split(""), {
                                caret: f,
                                dopost: !0,
                                placeholder: "0"
                            }, e)
                        }
                        return e.postValidation(u, {caret: f, dopost: !0, placeholder: "0", event: "blur"}, e);
                    case"_checkval":
                        return {caret: f}
                }
            },
            regex: {
                integerPart: function (n, i) {
                    return i ? new RegExp("[" + t.escapeRegex(n.negationSymbol.front) + "+]?") : new RegExp("[" + t.escapeRegex(n.negationSymbol.front) + "+]?\\d+")
                }, integerNPart: function (n) {
                    return new RegExp("[\\d" + t.escapeRegex(n.groupSeparator) + t.escapeRegex(n.placeholder.charAt(0)) + "]+")
                }
            },
            definitions: {
                "~": {
                    validator: function (n, r, u, f, e, o) {
                        var c = f ? new RegExp("[0-9" + t.escapeRegex(e.groupSeparator) + "]").test(n) : new RegExp("[0-9]").test(n),
                            s, h;
                        if (!0 === c) {
                            if (!0 !== e.numericInput && r.validPositions[u] !== i && "~" === r.validPositions[u].match.def && !o) {
                                for (s = r.buffer.join(""), s = s.replace(new RegExp("[-" + t.escapeRegex(e.negationSymbol.front) + "]", "g"), ""), s = s.replace(new RegExp(t.escapeRegex(e.negationSymbol.back) + "$"), ""), s = s.replace(/0/g, e.placeholder.charAt(0)), h = r._buffer.join(""), s === e.radixPoint && (s = h); null === s.match(t.escapeRegex(h) + "$");) h = h.slice(1);
                                s = s.replace(h, "");
                                s = s.split("");
                                c = s[u] === i ? {pos: u, remove: u} : {pos: u}
                            }
                        } else f || n !== e.radixPoint || r.validPositions[u - 1] !== i || (r.buffer[u] = "0", c = {pos: u + 1});
                        return c
                    }, cardinality: 1
                }, "+": {
                    validator: function (n, t, i, r, u) {
                        return u.allowMinus && ("-" === n || n === u.negationSymbol.front)
                    }, cardinality: 1, placeholder: ""
                }, "-": {
                    validator: function (n, t, i, r, u) {
                        return u.allowMinus && n === u.negationSymbol.back
                    }, cardinality: 1, placeholder: ""
                }, ":": {
                    validator: function (n, i, r, u, f) {
                        var o = "[" + t.escapeRegex(f.radixPoint) + "]", e = new RegExp(o).test(n);
                        return e && i.validPositions[r] && i.validPositions[r].match.placeholder === f.radixPoint && (e = {caret: r + 1}), e
                    }, cardinality: 1, placeholder: function (n) {
                        return n.radixPoint
                    }
                }
            },
            onUnMask: function (n, i, r) {
                if ("" === i && !0 === r.nullable) return i;
                var u = n.replace(r.prefix, "");
                return u = u.replace(r.suffix, ""), u = u.replace(new RegExp(t.escapeRegex(r.groupSeparator), "g"), ""), "" !== r.placeholder.charAt(0) && (u = u.replace(new RegExp(r.placeholder.charAt(0), "g"), "0")), r.unmaskAsNumber ? ("" !== r.radixPoint && -1 !== u.indexOf(r.radixPoint) && (u = u.replace(t.escapeRegex.call(this, r.radixPoint), ".")), u = u.replace(new RegExp("^" + t.escapeRegex(r.negationSymbol.front)), "-"), u = u.replace(new RegExp(t.escapeRegex(r.negationSymbol.back) + "$"), ""), Number(u)) : u
            },
            isComplete: function (n, i) {
                var u = n.join(""), r;
                return n.slice().join("") !== u ? !1 : (r = u.replace(i.prefix, ""), r = r.replace(i.suffix, ""), r = r.replace(new RegExp(t.escapeRegex(i.groupSeparator), "g"), ""), "," === i.radixPoint && (r = r.replace(t.escapeRegex(i.radixPoint), ".")), isFinite(r))
            },
            onBeforeMask: function (n, r) {
                var u, f, e, o, h, c, s;
                return (r.isNegative = i, n = n.toString().charAt(n.length - 1) === r.radixPoint ? n.toString().substr(0, n.length - 1) : n.toString(), "" !== r.radixPoint && isFinite(n)) && (u = n.split("."), f = "" !== r.groupSeparator ? parseInt(r.groupSize) : 0, 2 === u.length && (u[0].length > f || u[1].length > f || u[0].length <= f && u[1].length < f) && (n = n.replace(".", r.radixPoint))), e = n.match(/,/g), o = n.match(/\./g), (o && e ? o.length > e.length ? (n = n.replace(/\./g, ""), n = n.replace(",", r.radixPoint)) : e.length > o.length ? (n = n.replace(/,/g, ""), n = n.replace(".", r.radixPoint)) : n = n.indexOf(".") < n.indexOf(",") ? n.replace(/\./g, "") : n = n.replace(/,/g, "") : n = n.replace(new RegExp(t.escapeRegex(r.groupSeparator), "g"), ""), 0 === r.digits && (-1 !== n.indexOf(".") ? n = n.substring(0, n.indexOf(".")) : -1 !== n.indexOf(",") && (n = n.substring(0, n.indexOf(",")))), "" !== r.radixPoint && isFinite(r.digits) && -1 !== n.indexOf(r.radixPoint)) && (h = n.split(r.radixPoint), c = h[1].match(new RegExp("\\d*"))[0], parseInt(r.digits) < c.toString().length && (s = Math.pow(10, parseInt(r.digits)), n = n.replace(t.escapeRegex(r.radixPoint), "."), n = Math.round(parseFloat(n) * s) / s, n = n.toString().replace(".", r.radixPoint))), n
            },
            canClearPosition: function (n, t, i, r, u) {
                var f = n.validPositions[t],
                    e = f.input !== u.radixPoint || null !== n.validPositions[t].match.fn && !1 === u.decimalProtect || f.input === u.radixPoint && n.validPositions[t + 1] && null === n.validPositions[t + 1].match.fn || isFinite(f.input) || t === i || f.input === u.groupSeparator || f.input === u.negationSymbol.front || f.input === u.negationSymbol.back;
                return !e || "+" != f.match.nativeDef && "-" != f.match.nativeDef || (u.isNegative = !1), e
            },
            onKeyDown: function (i, r, u, f) {
                var e = n(this);
                if (i.ctrlKey) switch (i.keyCode) {
                    case t.keyCode.UP:
                        e.val(parseFloat(this.inputmask.unmaskedvalue()) + parseInt(f.step));
                        e.trigger("setvalue");
                        break;
                    case t.keyCode.DOWN:
                        e.val(parseFloat(this.inputmask.unmaskedvalue()) - parseInt(f.step));
                        e.trigger("setvalue")
                }
            }
        },
        currency: {
            prefix: "$ ",
            groupSeparator: ",",
            alias: "numeric",
            placeholder: "0",
            autoGroup: !0,
            digits: 2,
            digitsOptional: !1,
            clearMaskOnLostFocus: !1
        },
        decimal: {alias: "numeric"},
        integer: {alias: "numeric", digits: 0, radixPoint: ""},
        percentage: {
            alias: "numeric",
            digits: 2,
            digitsOptional: !0,
            radixPoint: ".",
            placeholder: "0",
            autoGroup: !1,
            min: 0,
            max: 100,
            suffix: " %",
            allowMinus: !1
        }
    }), t
});
!function (n, t) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define(t) : n.IntlPolyfill = t()
}(this, function () {
    "use strict";

    function ct(n) {
        if ("function" == typeof Math.log10) return Math.floor(Math.log10(n));
        var t = Math.round(Math.log(n) * Math.LOG10E);
        return t - (Number("1e" + t) > n)
    }

    function e(t) {
        for (var i in t) (t instanceof e || n.call(t, i)) && r(this, i, {
            value: t[i],
            enumerable: !0,
            writable: !0,
            configurable: !0
        })
    }

    function o() {
        r(this, "length", {writable: !0, value: 0});
        arguments.length && t.apply(this, d.call(arguments))
    }

    function g() {
        if (u.disableRegExpRestore) return function () {
        };
        for (var n = {
            lastMatch: RegExp.lastMatch || "",
            leftContext: RegExp.leftContext,
            multiline: RegExp.multiline,
            input: RegExp.input
        }, i = !1, t = 1; t <= 9; t++) i = (n["$" + t] = RegExp["$" + t]) || i;
        return function () {
            var o = /[.?*+^$[\]\\(){}|-]/g, t = n.lastMatch.replace(o, "\\$&"), u = "", f, r, e;
            if (i) for (f = 1; f <= 9; f++) r = n["$" + f], r ? (r = r.replace(o, "\\$&"), u += t.substring(0, t.indexOf(r)) + "(", t = r + ")" + t.substring(t.indexOf(r) + r.length)) : (u += "(", t = ")" + t);
            u += t;
            u = u.replace(/((^|[^\\])((\\\\)*\\[()])+|[^()])+/g, function (n) {
                return "[\\s\\S]{" + n.replace(/\\(.)/g, "$1").length + "}"
            });
            e = new RegExp(u, n.multiline ? "gm" : "g");
            e.lastIndex = n.leftContext.length;
            e.exec(n.input)
        }
    }

    function k(n) {
        if (null === n) throw new TypeError("Cannot convert null or undefined to object");
        return "object" === ("undefined" == typeof n ? "undefined" : y.typeof(n)) ? n : Object(n)
    }

    function lt(n) {
        return "number" == typeof n ? n : Number(n)
    }

    function tr(n) {
        var t = lt(n);
        return isNaN(t) ? 0 : 0 === t || t === -0 || t === +(1 / 0) || t === -(1 / 0) ? t : t < 0 ? Math.floor(Math.abs(t)) * -1 : Math.floor(Math.abs(t))
    }

    function ir(n) {
        var t = tr(n);
        return t <= 0 ? 0 : t === 1 / 0 ? Math.pow(2, 53) - 1 : Math.min(t, Math.pow(2, 53) - 1)
    }

    function s(t) {
        return n.call(t, "__getInternalProperties") ? t.__getInternalProperties(ht) : w(null)
    }

    function rr(n) {
        vt = n
    }

    function kt(n) {
        for (var i, t = n.length; t--;) i = n.charAt(t), i >= "a" && i <= "z" && (n = n.slice(0, t) + i.toUpperCase() + n.slice(t + 1));
        return n
    }

    function dt(n) {
        return !!df.test(n) && !gf.test(n) && !ne.test(n)
    }

    function gt(t) {
        var f = void 0, i = void 0, r, o, u, e;
        for (t = t.toLowerCase(), i = t.split("-"), r = 1, o = i.length; r < o; r++) if (2 === i[r].length) i[r] = i[r].toUpperCase(); else if (4 === i[r].length) i[r] = i[r].charAt(0).toUpperCase() + i[r].slice(1); else if (1 === i[r].length && "x" !== i[r]) break;
        for (t = l.call(i, "-"), (f = t.match(gi)) && f.length > 1 && (f.sort(), t = t.replace(RegExp("(?:" + gi.source + ")+", "i"), l.call(f, ""))), n.call(b.tags, t) && (t = b.tags[t]), i = t.split("-"), u = 1, e = i.length; u < e; u++) n.call(b.subtags, i[u]) ? i[u] = b.subtags[i[u]] : n.call(b.extLang, i[u]) && (i[u] = b.extLang[i[u]][0], 1 === u && b.extLang[i[1]][1] === i[0] && (i = d.call(i, u++), e -= 1));
        return l.call(i, "-")
    }

    function ur() {
        return vt
    }

    function fr(n) {
        var t = String(n), i = kt(t);
        return te.test(i) !== !1
    }

    function nt(n) {
        var u, s, h, r, i;
        if (void 0 === n) return new o;
        u = new o;
        n = "string" == typeof n ? [n] : n;
        for (var f = k(n), c = ir(f.length), e = 0; e < c;) {
            if (s = String(e), h = s in f, h) {
                if (r = f[s], null === r || "string" != typeof r && "object" !== ("undefined" == typeof r ? "undefined" : y.typeof(r))) throw new TypeError("String or Object type expected");
                if (i = String(r), !dt(i)) throw new RangeError("'" + i + "' is not a structurally valid language tag");
                i = gt(i);
                p.call(u, i) === -1 && t.call(u, i)
            }
            e++
        }
        return u
    }

    function ni(n, t) {
        for (var r, i = t; i;) {
            if (p.call(n, i) > -1) return i;
            if (r = i.lastIndexOf("-"), r < 0) return;
            r >= 2 && "-" === i.charAt(r - 2) && (r -= 2);
            i = i.substring(0, r)
        }
    }

    function ti(n, t) {
        for (var i, s, h, f = 0, c = t.length, u = void 0, r = void 0, o = void 0; f < c && !u;) r = t[f], o = String(r).replace(yt, ""), u = ni(n, o), f++;
        return i = new e, void 0 !== u ? (i["[[locale]]"] = u, String(r) !== String(o)) && (s = r.match(yt)[0], h = r.indexOf("-u-"), i["[[extension]]"] = s, i["[[extensionIndex]]"] = h) : i["[[locale]]"] = ur(), i
    }

    function er(n, t) {
        return ti(n, t)
    }

    function or(n) {
        var f = n.length, o, s, h, c, l, a;
        if (0 === f) return [];
        for (var u = [], e = !0, t = 3, i = t, r = t; t < f;) o = n.codePointAt(t), 45 === o && (t - i == 2 ? (i - r > 1 && (s = n.substring(r, i - 1), u.push(s)), h = n.substring(i, t), u.push(h), r = t + 1, e = !1) : e === !0 && (c = n.substring(i, t), u.push(c), r = t + 1), i = t + 1), t += 1;
        return f - i == 2 && (i - r > 1 && (l = n.substring(r, i - 1), u.push(l)), r = i), a = n.substring(r, f), u.push(a), u
    }

    function ii(t, i, r, u, f) {
        var it, l, ut, a, v, tt, ft, et, k, d, ot, st;
        if (0 === t.length) throw new ReferenceError("No locale data has been provided for this object yet.");
        it = r["[[localeMatcher]]"];
        l = void 0;
        l = "lookup" === it ? ti(t, i) : er(t, i);
        var o = l["[[locale]]"], s = void 0, rt = void 0;
        n.call(l, "[[extension]]") && (ut = l["[[extension]]"], s = or(ut), rt = s.length);
        a = new e;
        a["[[dataLocale]]"] = o;
        for (var y = "-u", g = 0, ht = u.length; g < ht;) {
            var h = u[g], ct = f[o], w = ct[h], c = w[0], nt = "", b = p;
            void 0 !== s && (v = b.call(s, h), v !== -1 && (v + 1 < rt && s[v + 1].length > 2 ? (tt = s[v + 1], ft = b.call(w, tt), ft !== -1 && (c = tt, nt = "-" + h + "-" + c)) : (et = b(w, "true"), et !== -1 && (c = "true"))));
            n.call(r, "[[" + h + "]]") && (k = r["[[" + h + "]]"], b.call(w, k) !== -1 && k !== c && (c = k, nt = ""));
            a["[[" + h + "]]"] = c;
            y += nt;
            g++
        }
        return y.length > 2 && (d = o.indexOf("-x-"), d === -1 ? o += y : (ot = o.substring(0, d), st = o.substring(d), o = ot + y + st), o = gt(o)), a["[[locale]]"] = o, a
    }

    function ri(n, i) {
        for (var e = i.length, u = new o, r = 0; r < e;) {
            var f = i[r], s = String(f).replace(yt, ""), h = ni(n, s);
            void 0 !== h && t.call(u, f);
            r++
        }
        return d.call(u)
    }

    function sr(n, t) {
        return ri(n, t)
    }

    function ui(t, i, u) {
        var f = void 0, o = void 0, s;
        if (void 0 !== u && (u = new e(k(u)), f = u.localeMatcher, void 0 !== f && (f = String(f), "lookup" !== f && "best fit" !== f))) throw new RangeError('matcher should be "lookup" or "best fit"');
        o = void 0 === f || "best fit" === f ? sr(t, i) : ri(t, i);
        for (s in o) n.call(o, s) && r(o, s, {writable: !1, configurable: !1, value: o[s]});
        return r(o, "length", {writable: !1}), o
    }

    function h(n, t, i, r, u) {
        var f = n[t];
        if (void 0 !== f) {
            if (f = "boolean" === i ? Boolean(f) : "string" === i ? String(f) : f, void 0 !== r && p.call(r, f) === -1) throw new RangeError("'" + f + "' is not an allowed value for `" + t + "`");
            return f
        }
        return u
    }

    function tt(n, t, i, r, u) {
        var f = n[t];
        if (void 0 !== f) {
            if (f = Number(f), isNaN(f) || f < i || f > r) throw new RangeError("Value is not a number or outside accepted range");
            return Math.floor(f)
        }
        return u
    }

    function hr(n) {
        for (var i = nt(n), r = [], u = i.length, t = 0; t < u;) r[t] = i[t], t++;
        return r
    }

    function fi() {
        var n = arguments[0], t = arguments[1];
        return this && this !== i ? cr(k(this), n, t) : new i.NumberFormat(n, t)
    }

    function cr(n, t, i) {
        var f = s(n), vt = g(), it, b, rt, d, v, ut, c, l, p, ft, et, ot, a, st, ct, y, w, lt;
        if (f["[[initializedIntlObject]]"] === !0) throw new TypeError("`this` object has already been initialized as an Intl object");
        if (r(n, "__getInternalProperties", {
            value: function () {
                if (arguments[0] === ht) return f
            }
        }), f["[[initializedIntlObject]]"] = !0, it = nt(t), i = void 0 === i ? {} : k(i), b = new e, rt = h(i, "localeMatcher", "string", new o("lookup", "best fit"), "best fit"), b["[[localeMatcher]]"] = rt, d = u.NumberFormat["[[localeData]]"], v = ii(u.NumberFormat["[[availableLocales]]"], it, b, u.NumberFormat["[[relevantExtensionKeys]]"], d), f["[[locale]]"] = v["[[locale]]"], f["[[numberingSystem]]"] = v["[[nu]]"], f["[[dataLocale]]"] = v["[[dataLocale]]"], ut = v["[[dataLocale]]"], c = h(i, "style", "string", new o("decimal", "percent", "currency"), "decimal"), f["[[style]]"] = c, l = h(i, "currency", "string"), void 0 !== l && !fr(l)) throw new RangeError("'" + l + "' is not a valid currency code");
        if ("currency" === c && void 0 === l) throw new TypeError("Currency code is required when style is currency");
        p = void 0;
        "currency" === c && (l = l.toUpperCase(), f["[[currency]]"] = l, p = lr(l));
        ft = h(i, "currencyDisplay", "string", new o("code", "symbol", "name"), "symbol");
        "currency" === c && (f["[[currencyDisplay]]"] = ft);
        et = tt(i, "minimumIntegerDigits", 1, 21, 1);
        f["[[minimumIntegerDigits]]"] = et;
        ot = "currency" === c ? p : 0;
        a = tt(i, "minimumFractionDigits", 0, 20, ot);
        f["[[minimumFractionDigits]]"] = a;
        st = "currency" === c ? Math.max(a, p) : "percent" === c ? Math.max(a, 0) : Math.max(a, 3);
        ct = tt(i, "maximumFractionDigits", a, 20, st);
        f["[[maximumFractionDigits]]"] = ct;
        y = i.minimumSignificantDigits;
        w = i.maximumSignificantDigits;
        void 0 === y && void 0 === w || (y = tt(i, "minimumSignificantDigits", 1, 21, 1), w = tt(i, "maximumSignificantDigits", y, 21, 21), f["[[minimumSignificantDigits]]"] = y, f["[[maximumSignificantDigits]]"] = w);
        lt = h(i, "useGrouping", "boolean", void 0, !0);
        f["[[useGrouping]]"] = lt;
        var yt = d[ut], pt = yt.patterns, at = pt[c];
        return f["[[positivePattern]]"] = at.positivePattern, f["[[negativePattern]]"] = at.negativePattern, f["[[boundFormat]]"] = void 0, f["[[initializedNumberFormat]]"] = !0, vi && (n.format = ei.call(n)), vt(), n
    }

    function lr(n) {
        return void 0 !== pt[n] ? pt[n] : 2
    }

    function ei() {
        var n = null !== this && "object" === y.typeof(this) && s(this), t, i;
        if (!n || !n["[[initializedNumberFormat]]"]) throw new TypeError("`this` value for format() is not an initialized Intl.NumberFormat object.");
        return void 0 === n["[[boundFormat]]"] && (t = function (n) {
            return ut(this, Number(n))
        }, i = st.call(t, this), n["[[boundFormat]]"] = i), n["[[boundFormat]]"]
    }

    function ar() {
        var i = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : void 0,
            n = null !== this && "object" === y.typeof(this) && s(this), t;
        if (!n || !n["[[initializedNumberFormat]]"]) throw new TypeError("`this` value for formatToParts() is not an initialized Intl.NumberFormat object.");
        return t = Number(i), vr(this, t)
    }

    function vr(n, t) {
        for (var u, i, f = oi(n, t), e = [], o = 0, r = 0; f.length > r; r++) u = f[r], i = {}, i.type = u["[[type]]"], i.value = u["[[value]]"], e[o] = i, o += 1;
        return e
    }

    function yr(t, i) {
        var r = s(t);
        return n.call(r, "[[minimumSignificantDigits]]") && n.call(r, "[[maximumSignificantDigits]]") ? pr(i, r["[[minimumSignificantDigits]]"], r["[[maximumSignificantDigits]]"]) : wr(i, r["[[minimumIntegerDigits]]"], r["[[minimumFractionDigits]]"], r["[[maximumFractionDigits]]"])
    }

    function oi(n, i) {
        var f = s(n), dt = f["[[dataLocale]]"], it = f["[[numberingSystem]]"], w = u.NumberFormat["[[localeData]]"][dt],
            v = w.symbols[it] || w.symbols.latn, e = void 0, ot, p, st, h, ct, lt, at, vt, yt, pt, d, g, bt, kt;
        !isNaN(i) && i < 0 ? (i = -i, e = f["[[negativePattern]]"]) : e = f["[[positivePattern]]"];
        for (var r = new o, l = e.indexOf("{", 0), b = 0, y = 0, rt = e.length; l > -1 && l < rt;) {
            if (b = e.indexOf("}", l), b === -1) throw new Error;
            if (l > y && (ot = e.substring(y, l), t.call(r, {
                "[[type]]": "literal",
                "[[value]]": ot
            })), p = e.substring(l + 1, b), "number" === p) if (isNaN(i)) st = v.nan, t.call(r, {
                "[[type]]": "nan",
                "[[value]]": st
            }); else if (isFinite(i)) {
                "percent" === f["[[style]]"] && (i *= 100);
                h = yr(n, i);
                wt[it] ? !function () {
                    var n = wt[it];
                    h = String(h).replace(/\d/g, function (t) {
                        return n[t]
                    })
                }() : h = String(h);
                var c = void 0, nt = void 0, tt = h.indexOf(".", 0);
                if (tt > 0 ? (c = h.substring(0, tt), nt = h.substring(tt + 1, tt.length)) : (c = h, nt = void 0), f["[[useGrouping]]"] === !0) {
                    var gt = v.group, a = [], ut = w.patterns.primaryGroupSize || 3,
                        ft = w.patterns.secondaryGroupSize || ut;
                    if (c.length > ut) {
                        var et = c.length - ut, k = et % ft, ht = c.slice(0, k);
                        for (ht.length && t.call(a, ht); k < et;) t.call(a, c.slice(k, k + ft)), k += ft;
                        t.call(a, c.slice(et))
                    } else t.call(a, c);
                    if (0 === a.length) throw new Error;
                    for (; a.length;) ct = pi.call(a), t.call(r, {
                        "[[type]]": "integer",
                        "[[value]]": ct
                    }), a.length && t.call(r, {"[[type]]": "group", "[[value]]": gt})
                } else t.call(r, {"[[type]]": "integer", "[[value]]": c});
                void 0 !== nt && (lt = v.decimal, t.call(r, {
                    "[[type]]": "decimal",
                    "[[value]]": lt
                }), t.call(r, {"[[type]]": "fraction", "[[value]]": nt}))
            } else at = v.infinity, t.call(r, {
                "[[type]]": "infinity",
                "[[value]]": at
            }); else "plusSign" === p ? (vt = v.plusSign, t.call(r, {
                "[[type]]": "plusSign",
                "[[value]]": vt
            })) : "minusSign" === p ? (yt = v.minusSign, t.call(r, {
                "[[type]]": "minusSign",
                "[[value]]": yt
            })) : "percentSign" === p && "percent" === f["[[style]]"] ? (pt = v.percentSign, t.call(r, {
                "[[type]]": "literal",
                "[[value]]": pt
            })) : "currency" === p && "currency" === f["[[style]]"] ? (d = f["[[currency]]"], g = void 0, "code" === f["[[currencyDisplay]]"] ? g = d : "symbol" === f["[[currencyDisplay]]"] ? g = w.currencies[d] || d : "name" === f["[[currencyDisplay]]"] && (g = d), t.call(r, {
                "[[type]]": "currency",
                "[[value]]": g
            })) : (bt = e.substring(l, b), t.call(r, {"[[type]]": "literal", "[[value]]": bt}));
            y = b + 1;
            l = e.indexOf("{", y)
        }
        return y < rt && (kt = e.substring(y, rt), t.call(r, {"[[type]]": "literal", "[[value]]": kt})), r
    }

    function ut(n, t) {
        for (var f, r = oi(n, t), u = "", i = 0; r.length > i; i++) f = r[i], u += f["[[value]]"];
        return u
    }

    function pr(n, t, i) {
        var f = i, r = void 0, u = void 0, e, o;
        if (0 === n ? (r = l.call(Array(f + 1), "0"), u = 0) : (u = ct(Math.abs(n)), e = Math.round(Math.exp(Math.abs(u - f + 1) * Math.LN10)), r = String(Math.round(u - f + 1 < 0 ? n * e : n / e))), u >= f) return r + l.call(Array(u - f + 1 + 1), "0");
        if (u === f - 1) return r;
        if (u >= 0 ? r = r.slice(0, u + 1) + "." + r.slice(u + 1) : u < 0 && (r = "0." + l.call(Array(-(u + 1) + 1), "0") + r), r.indexOf(".") >= 0 && i > t) {
            for (o = i - t; o > 0 && "0" === r.charAt(r.length - 1);) r = r.slice(0, -1), o--;
            "." === r.charAt(r.length - 1) && (r = r.slice(0, -1))
        }
        return r
    }

    function wr(n, t, i, r) {
        var f = r, a = Math.pow(10, f) * n, u = 0 === a ? "0" : a.toFixed(0), s = void 0,
            v = (s = u.indexOf("e")) > -1 ? u.slice(s + 1) : 0, o, e, y, h, p, c, w;
        for (v && (u = u.slice(0, s).replace(".", ""), u += l.call(Array(v - (u.length - 1) + 1), "0")), o = void 0, 0 !== f ? (e = u.length, e <= f && (y = l.call(Array(f + 1 - e + 1), "0"), u = y + u, e = f + 1), h = u.substring(0, e - f), p = u.substring(e - f, u.length), u = h + "." + p, o = h.length) : o = u.length, c = r - i; c > 0 && "0" === u.slice(-1);) u = u.slice(0, -1), c--;
        return ("." === u.slice(-1) && (u = u.slice(0, -1)), o < t) && (w = l.call(Array(t - o + 1), "0"), u = w + u), u
    }

    function br(n) {
        for (var t = 0; t < v.length; t += 1) if (n.hasOwnProperty(v[t])) return !1;
        return !0
    }

    function kr(n) {
        for (var t = 0; t < a.length; t += 1) if (n.hasOwnProperty(a[t])) return !1;
        return !0
    }

    function dr(n, t) {
        for (var r, u = {_: {}}, i = 0; i < a.length; i += 1) n[a[i]] && (u[a[i]] = n[a[i]]), n._[a[i]] && (u._[a[i]] = n._[a[i]]);
        for (r = 0; r < v.length; r += 1) t[v[r]] && (u[v[r]] = t[v[r]]), t._[v[r]] && (u._[v[r]] = t._[v[r]]);
        return u
    }

    function si(n) {
        return n.pattern12 = n.extendedPattern.replace(/'([^']*)'/g, function (n, t) {
            return t ? t : "'"
        }), n.pattern = n.pattern12.replace("{ampm}", "").replace(ie, ""), n
    }

    function hi(n, t) {
        switch (n.charAt(0)) {
            case"G":
                return t.era = ["short", "short", "short", "long", "narrow"][n.length - 1], "{era}";
            case"y":
            case"Y":
            case"u":
            case"U":
            case"r":
                return t.year = 2 === n.length ? "2-digit" : "numeric", "{year}";
            case"Q":
            case"q":
                return t.quarter = ["numeric", "2-digit", "short", "long", "narrow"][n.length - 1], "{quarter}";
            case"M":
            case"L":
                return t.month = ["numeric", "2-digit", "short", "long", "narrow"][n.length - 1], "{month}";
            case"w":
                return t.week = 2 === n.length ? "2-digit" : "numeric", "{weekday}";
            case"W":
                return t.week = "numeric", "{weekday}";
            case"d":
                return t.day = 2 === n.length ? "2-digit" : "numeric", "{day}";
            case"D":
            case"F":
            case"g":
                return t.day = "numeric", "{day}";
            case"E":
                return t.weekday = ["short", "short", "short", "long", "narrow", "short"][n.length - 1], "{weekday}";
            case"e":
                return t.weekday = ["numeric", "2-digit", "short", "long", "narrow", "short"][n.length - 1], "{weekday}";
            case"c":
                return t.weekday = ["numeric", void 0, "short", "long", "narrow", "short"][n.length - 1], "{weekday}";
            case"a":
            case"b":
            case"B":
                return t.hour12 = !0, "{ampm}";
            case"h":
            case"H":
                return t.hour = 2 === n.length ? "2-digit" : "numeric", "{hour}";
            case"k":
            case"K":
                return t.hour12 = !0, t.hour = 2 === n.length ? "2-digit" : "numeric", "{hour}";
            case"m":
                return t.minute = 2 === n.length ? "2-digit" : "numeric", "{minute}";
            case"s":
                return t.second = 2 === n.length ? "2-digit" : "numeric", "{second}";
            case"S":
            case"A":
                return t.second = "numeric", "{second}";
            case"z":
            case"Z":
            case"O":
            case"v":
            case"V":
            case"X":
            case"x":
                return t.timeZoneName = n.length < 4 ? "short" : "long", "{timeZoneName}"
        }
    }

    function at(n, t) {
        if (!re.test(t)) {
            var i = {originalPattern: t, _: {}};
            return i.extendedPattern = t.replace(nr, function (n) {
                return hi(n, i._)
            }), n.replace(nr, function (n) {
                return hi(n, i)
            }), si(i)
        }
    }

    function gr(n) {
        var h = n.availableFormats, c = n.timeFormats, l = n.dateFormats, e = [], i = void 0, r = void 0, t = void 0,
            o = void 0, u = void 0, s = [], f = [];
        for (i in h) h.hasOwnProperty(i) && (r = h[i], t = at(i, r), t && (e.push(t), br(t) ? f.push(t) : kr(t) && s.push(t)));
        for (i in c) c.hasOwnProperty(i) && (r = c[i], t = at(i, r), t && (e.push(t), s.push(t)));
        for (i in l) l.hasOwnProperty(i) && (r = l[i], t = at(i, r), t && (e.push(t), f.push(t)));
        for (o = 0; o < s.length; o += 1) for (u = 0; u < f.length; u += 1) r = "long" === f[u].month ? f[u].weekday ? n.full : n.long : "short" === f[u].month ? n.medium : n.short, t = dr(f[u], s[o]), t.originalPattern = r, t.extendedPattern = r.replace("{0}", s[o].extendedPattern).replace("{1}", f[u].extendedPattern).replace(/^[,\s]+|[,\s]+$/gi, ""), e.push(si(t));
        return e
    }

    function nu(n, t) {
        if (bt[n] && bt[n][t]) {
            var i;
            return i = {
                originalPattern: bt[n][t],
                _: rt({}, n, t),
                extendedPattern: "{" + n + "}"
            }, rt(i, n, t), rt(i, "pattern12", "{" + n + "}"), rt(i, "pattern", "{" + n + "}"), i
        }
    }

    function ft(t, i, r, u, f) {
        var e = t[i] && t[i][r] ? t[i][r] : t.gregory[r],
            o = {narrow: ["short", "long"], short: ["long", "narrow"], long: ["short", "narrow"]},
            s = n.call(e, u) ? e[u] : n.call(e, o[u][0]) ? e[o[u][0]] : e[o[u][1]];
        return null !== f ? s[f] : s
    }

    function it() {
        var n = arguments[0], t = arguments[1];
        return this && this !== i ? tu(k(this), n, t) : new i.DateTimeFormat(n, t)
    }

    function tu(t, i, c) {
        var l = s(t), yt = g(), st, v, it, lt, p, k, at, ot, y, rt, tt, w, vt;
        if (l["[[initializedIntlObject]]"] === !0) throw new TypeError("`this` object has already been initialized as an Intl object");
        r(t, "__getInternalProperties", {
            value: function () {
                if (arguments[0] === ht) return l
            }
        });
        l["[[initializedIntlObject]]"] = !0;
        st = nt(i);
        c = et(c, "any", "date");
        v = new e;
        it = h(c, "localeMatcher", "string", new o("lookup", "best fit"), "best fit");
        v["[[localeMatcher]]"] = it;
        var ut = u.DateTimeFormat, ct = ut["[[localeData]]"],
            b = ii(ut["[[availableLocales]]"], st, v, ut["[[relevantExtensionKeys]]"], ct);
        if (l["[[locale]]"] = b["[[locale]]"], l["[[calendar]]"] = b["[[ca]]"], l["[[numberingSystem]]"] = b["[[nu]]"], l["[[dataLocale]]"] = b["[[dataLocale]]"], lt = b["[[dataLocale]]"], p = c.timeZone, void 0 !== p && (p = kt(p), "UTC" !== p)) throw new RangeError("timeZone is not supported.");
        l["[[timeZone]]"] = p;
        v = new e;
        for (k in f) n.call(f, k) && (at = h(c, k, "string", f[k]), v["[[" + k + "]]"] = at);
        var a = void 0, d = ct[lt], ft = iu(d.formats);
        (it = h(c, "formatMatcher", "string", new o("basic", "best fit"), "best fit"), d.formats = ft, "basic" === it) ? a = ru(v, ft) : (ot = h(c, "hour12", "boolean"), v.hour12 = void 0 === ot ? d.hour12 : ot, a = uu(v, ft));
        for (y in f) n.call(f, y) && n.call(a, y) && (rt = a[y], rt = a._ && n.call(a._, y) ? a._[y] : rt, l["[[" + y + "]]"] = rt);
        return tt = void 0, w = h(c, "hour12", "boolean"), l["[[hour]]"] ? (w = void 0 === w ? d.hour12 : w, l["[[hour12]]"] = w, w === !0) ? (vt = d.hourNo0, l["[[hourNo0]]"] = vt, tt = a.pattern12) : tt = a.pattern : tt = a.pattern, l["[[pattern]]"] = tt, l["[[boundFormat]]"] = void 0, l["[[initializedDateTimeFormat]]"] = !0, vi && (t.format = ci.call(t)), yt(), t
    }

    function iu(n) {
        return "[object Array]" === Object.prototype.toString.call(n) ? n : gr(n)
    }

    function et(n, t, i) {
        var u, f, o, r;
        if (void 0 === n) n = null; else {
            u = k(n);
            n = new e;
            for (f in u) n[f] = u[f]
        }
        return o = w, n = o(n), r = !0, "date" !== t && "any" !== t || void 0 === n.weekday && void 0 === n.year && void 0 === n.month && void 0 === n.day || (r = !1), "time" !== t && "any" !== t || void 0 === n.hour && void 0 === n.minute && void 0 === n.second || (r = !1), !r || "date" !== i && "all" !== i || (n.year = n.month = n.day = "numeric"), !r || "time" !== i && "all" !== i || (n.hour = n.minute = n.second = "numeric"), n
    }

    function ru(t, i) {
        for (var e, r, u, o, s, l = -(1 / 0), a = void 0, c = 0, y = i.length; c < y;) {
            e = i[c];
            r = 0;
            for (u in f) if (n.call(f, u)) if (o = t["[[" + u + "]]"], s = n.call(e, u) ? e[u] : void 0, void 0 === o && void 0 !== s) r -= 20; else if (void 0 !== o && void 0 === s) r -= 120; else {
                var v = ["2-digit", "numeric", "narrow", "short", "long"], w = p.call(v, o), b = p.call(v, s),
                    h = Math.max(Math.min(b - w, 2), -2);
                2 === h ? r -= 6 : 1 === h ? r -= 3 : h === -1 ? r -= 6 : h === -2 && (r -= 8)
            }
            r > l && (l = r, a = e);
            c++
        }
        return a
    }

    function uu(t, i) {
        var o = [], s, l, u, r, e;
        for (s in f) n.call(f, s) && void 0 !== t["[[" + s + "]]"] && o.push(s);
        if (1 === o.length && (l = nu(o[0], t["[[" + o[0] + "]]"]), l)) return l;
        for (var b = -(1 / 0), k = void 0, a = 0, g = i.length; a < g;) {
            u = i[a];
            r = 0;
            for (e in f) if (n.call(f, e)) {
                var h = t["[[" + e + "]]"], v = n.call(u, e) ? u[e] : void 0, nt = n.call(u._, e) ? u._[e] : void 0;
                if (h !== nt && (r -= 2), void 0 === h && void 0 !== v) r -= 20; else if (void 0 !== h && void 0 === v) r -= 120; else {
                    var d = ["2-digit", "numeric", "narrow", "short", "long"], y = p.call(d, h), w = p.call(d, v),
                        c = Math.max(Math.min(w - y, 2), -2);
                    w <= 1 && y >= 2 || w >= 2 && y <= 1 ? c > 0 ? r -= 6 : c < 0 && (r -= 8) : c > 1 ? r -= 3 : c < -1 && (r -= 6)
                }
            }
            u._.hour12 !== t.hour12 && (r -= 1);
            r > b && (b = r, k = u);
            a++
        }
        return k
    }

    function ci() {
        var n = null !== this && "object" === y.typeof(this) && s(this), t, i;
        if (!n || !n["[[initializedDateTimeFormat]]"]) throw new TypeError("`this` value for format() is not an initialized Intl.DateTimeFormat object.");
        return void 0 === n["[[boundFormat]]"] && (t = function () {
            var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : void 0,
                t = void 0 === n ? Date.now() : lt(n);
            return ot(this, t)
        }, i = st.call(t, this), n["[[boundFormat]]"] = i), n["[[boundFormat]]"]
    }

    function fu() {
        var n = arguments.length > 0 && void 0 !== arguments[0] ? arguments[0] : void 0,
            t = null !== this && "object" === y.typeof(this) && s(this), i;
        if (!t || !t["[[initializedDateTimeFormat]]"]) throw new TypeError("`this` value for formatToParts() is not an initialized Intl.DateTimeFormat object.");
        return i = void 0 === n ? Date.now() : lt(n), eu(this, i)
    }

    function li(n, r) {
        var h, e, s, y, c, tt;
        if (!isFinite(r)) throw new RangeError("Invalid valid date passed to format");
        h = n.__getInternalProperties(ht);
        g();
        for (var b = h["[[locale]]"], it = new i.NumberFormat([b], {useGrouping: !1}), rt = new i.NumberFormat([b], {
            minimumIntegerDigits: 2,
            useGrouping: !1
        }), p = ou(r, h["[[calendar]]"], h["[[timeZone]]"]), l = h["[[pattern]]"], w = new o, k = 0, a = l.indexOf("{"), v = 0, et = h["[[dataLocale]]"], d = u.DateTimeFormat["[[localeData]]"][et].calendars, nt = h["[[calendar]]"]; a !== -1;) {
            if (e = void 0, v = l.indexOf("}", a), v === -1) throw new Error("Unclosed pattern");
            if (a > k && t.call(w, {
                type: "literal",
                value: l.substring(k, a)
            }), s = l.substring(a + 1, v), f.hasOwnProperty(s)) {
                if (y = h["[[" + s + "]]"], c = p["[[" + s + "]]"], "year" === s && c <= 0 ? c = 1 - c : "month" === s ? c++ : "hour" === s && h["[[hour12]]"] === !0 && (c %= 12, 0 === c && h["[[hourNo0]]"] === !0 && (c = 12)), "numeric" === y) e = ut(it, c); else if ("2-digit" === y) e = ut(rt, c), e.length > 2 && (e = e.slice(-2)); else if (y in ue) switch (s) {
                    case"month":
                        e = ft(d, nt, "months", y, p["[[" + s + "]]"]);
                        break;
                    case"weekday":
                        try {
                            e = ft(d, nt, "days", y, p["[[" + s + "]]"])
                        } catch (n) {
                            throw new Error("Could not find weekday data for locale " + b);
                        }
                        break;
                    case"timeZoneName":
                        e = "";
                        break;
                    case"era":
                        try {
                            e = ft(d, nt, "eras", y, p["[[" + s + "]]"])
                        } catch (n) {
                            throw new Error("Could not find era data for locale " + b);
                        }
                        break;
                    default:
                        e = p["[[" + s + "]]"]
                }
                t.call(w, {type: s, value: e})
            } else "ampm" === s ? (tt = p["[[hour]]"], e = ft(d, nt, "dayPeriods", tt > 11 ? "pm" : "am", null), t.call(w, {
                type: "dayPeriod",
                value: e
            })) : t.call(w, {type: "literal", value: l.substring(a, v + 1)});
            k = v + 1;
            a = l.indexOf("{", k)
        }
        return v < l.length - 1 && t.call(w, {type: "literal", value: l.substr(v + 1)}), w
    }

    function ot(n, t) {
        for (var f, r = li(n, t), u = "", i = 0; r.length > i; i++) f = r[i], u += f.value;
        return u
    }

    function eu(n, t) {
        for (var r, u = li(n, t), f = [], i = 0; u.length > i; i++) r = u[i], f.push({type: r.type, value: r.value});
        return f
    }

    function ou(n, t, i) {
        var r = new Date(n), u = "get" + (i || "");
        return new e({
            "[[weekday]]": r[u + "Day"](),
            "[[era]]": +(r[u + "FullYear"]() >= 0),
            "[[year]]": r[u + "FullYear"](),
            "[[month]]": r[u + "Month"](),
            "[[day]]": r[u + "Date"](),
            "[[hour]]": r[u + "Hours"](),
            "[[minute]]": r[u + "Minutes"](),
            "[[second]]": r[u + "Seconds"](),
            "[[inDST]]": !1
        })
    }

    function su(n, i) {
        if (!n.number) throw new Error("Object passed doesn't contain locale data for Intl.NumberFormat");
        var r = void 0, e = [i], f = i.split("-");
        for (f.length > 2 && 4 === f[1].length && t.call(e, f[0] + "-" + f[2]); r = pi.call(e);) t.call(u.NumberFormat["[[availableLocales]]"], r), u.NumberFormat["[[localeData]]"][r] = n.number, n.date && (n.date.nu = n.number.nu, t.call(u.DateTimeFormat["[[availableLocales]]"], r), u.DateTimeFormat["[[localeData]]"][r] = n.date);
        void 0 === vt && rr(i)
    }

    var hu = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (n) {
            return typeof n
        } : function (n) {
            return n && "function" == typeof Symbol && n.constructor === Symbol && n !== Symbol.prototype ? "symbol" : typeof n
        }, cu = function () {
            var n = "function" == typeof Symbol && Symbol.for && Symbol.for("react.element") || 60103;
            return function (t, i, r, u) {
                var o = t && t.defaultProps, f = arguments.length - 3, s, h, e;
                if (i || 0 === f || (i = {}), i && o) for (s in o) void 0 === i[s] && (i[s] = o[s]); else i || (i = o || {});
                if (1 === f) i.children = u; else if (f > 1) {
                    for (h = Array(f), e = 0; e < f; e++) h[e] = arguments[e + 3];
                    i.children = h
                }
                return {$$typeof: n, type: t, key: void 0 === r ? null : "" + r, ref: null, props: i, _owner: null}
            }
        }(), lu = function (n) {
            if ("function" == typeof Symbol) {
                if (Symbol.asyncIterator) {
                    var t = n[Symbol.asyncIterator];
                    if (null != t) return t.call(n)
                }
                if (Symbol.iterator) return n[Symbol.iterator]()
            }
            throw new TypeError("Object is not async iterable");
        }, au = function () {
            function t(n) {
                this.value = n
            }

            function n(n) {
                function e(n, t) {
                    return new Promise(function (f, e) {
                        var o = {key: n, arg: t, resolve: f, reject: e, next: null};
                        r ? r = r.next = o : (i = r = o, u(n, t))
                    })
                }

                function u(i, r) {
                    try {
                        var e = n[i](r), o = e.value;
                        o instanceof t ? Promise.resolve(o.value).then(function (n) {
                            u("next", n)
                        }, function (n) {
                            u("throw", n)
                        }) : f(e.done ? "return" : "normal", e.value)
                    } catch (t) {
                        f("throw", t)
                    }
                }

                function f(n, t) {
                    switch (n) {
                        case"return":
                            i.resolve({value: t, done: !0});
                            break;
                        case"throw":
                            i.reject(t);
                            break;
                        default:
                            i.resolve({value: t, done: !1})
                    }
                    i = i.next;
                    i ? u(i.key, i.arg) : r = null
                }

                var i, r;
                this._invoke = e;
                "function" != typeof n.return && (this.return = void 0)
            }

            return "function" == typeof Symbol && Symbol.asyncIterator && (n.prototype[Symbol.asyncIterator] = function () {
                return this
            }), n.prototype.next = function (n) {
                return this._invoke("next", n)
            }, n.prototype.throw = function (n) {
                return this._invoke("throw", n)
            }, n.prototype.return = function (n) {
                return this._invoke("return", n)
            }, {
                wrap: function (t) {
                    return function () {
                        return new n(t.apply(this, arguments))
                    }
                }, await: function (n) {
                    return new t(n)
                }
            }
        }(), vu = function (n, t) {
            function u(i, u) {
                return r = !0, u = new Promise(function (t) {
                    t(n[i](u))
                }), {done: !1, value: t(u)}
            }

            var i = {}, r = !1;
            return "function" == typeof Symbol && Symbol.iterator && (i[Symbol.iterator] = function () {
                return this
            }), i.next = function (n) {
                return r ? (r = !1, n) : u("next", n)
            }, "function" == typeof n.throw && (i.throw = function (n) {
                if (r) throw r = !1, n;
                return u("throw", n)
            }), "function" == typeof n.return && (i.return = function (n) {
                return u("return", n)
            }), i
        }, yu = function (n) {
            return function () {
                var t = n.apply(this, arguments);
                return new Promise(function (n, i) {
                    function r(u, f) {
                        try {
                            var e = t[u](f), o = e.value
                        } catch (n) {
                            return void i(n)
                        }
                        return e.done ? void n(o) : Promise.resolve(o).then(function (n) {
                            r("next", n)
                        }, function (n) {
                            r("throw", n)
                        })
                    }

                    return r("next")
                })
            }
        }, pu = function (n, t) {
            if (!(n instanceof t)) throw new TypeError("Cannot call a class as a function");
        }, wu = function () {
            function n(n, t) {
                for (var i, r = 0; r < t.length; r++) i = t[r], i.enumerable = i.enumerable || !1, i.configurable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, i.key, i)
            }

            return function (t, i, r) {
                return i && n(t.prototype, i), r && n(t, r), t
            }
        }(), bu = function (n, t) {
            var r, i;
            for (r in t) i = t[r], i.configurable = i.enumerable = !0, "value" in i && (i.writable = !0), Object.defineProperty(n, r, i);
            return n
        }, ku = function (n, t) {
            for (var r, u, f = Object.getOwnPropertyNames(t), i = 0; i < f.length; i++) r = f[i], u = Object.getOwnPropertyDescriptor(t, r), u && u.configurable && void 0 === n[r] && Object.defineProperty(n, r, u);
            return n
        }, rt = function (n, t, i) {
            return t in n ? Object.defineProperty(n, t, {
                value: i,
                enumerable: !0,
                configurable: !0,
                writable: !0
            }) : n[t] = i, n
        }, du = Object.assign || function (n) {
            for (var i, r, t = 1; t < arguments.length; t++) {
                i = arguments[t];
                for (r in i) Object.prototype.hasOwnProperty.call(i, r) && (n[r] = i[r])
            }
            return n
        }, gu = function ct(n, t, i) {
            var r, u, f;
            return (null === n && (n = Function.prototype), r = Object.getOwnPropertyDescriptor(n, t), void 0 === r) ? (u = Object.getPrototypeOf(n), null === u ? void 0 : ct(u, t, i)) : "value" in r ? r.value : (f = r.get, void 0 !== f ? f.call(i) : void 0)
        }, nf = function (n, t) {
            if ("function" != typeof t && null !== t) throw new TypeError("Super expression must either be null or a function, not " + typeof t);
            n.prototype = Object.create(t && t.prototype, {
                constructor: {
                    value: n,
                    enumerable: !1,
                    writable: !0,
                    configurable: !0
                }
            });
            t && (Object.setPrototypeOf ? Object.setPrototypeOf(n, t) : n.__proto__ = t)
        }, tf = function (n, t) {
            return null != t && "undefined" != typeof Symbol && t[Symbol.hasInstance] ? t[Symbol.hasInstance](n) : n instanceof t
        }, rf = function (n) {
            return n && n.__esModule ? n : {"default": n}
        }, uf = function (n) {
            var t, i;
            if (n && n.__esModule) return n;
            if (t = {}, null != n) for (i in n) Object.prototype.hasOwnProperty.call(n, i) && (t[i] = n[i]);
            return t.default = n, t
        }, ff = function (n, t) {
            if (n !== t) throw new TypeError("Cannot instantiate an arrow function");
        }, ef = function (n) {
            if (null == n) throw new TypeError("Cannot destructure undefined");
        }, of = function (n, t) {
            var r = {}, i;
            for (i in n) t.indexOf(i) >= 0 || Object.prototype.hasOwnProperty.call(n, i) && (r[i] = n[i]);
            return r
        }, sf = function (n, t) {
            if (!n) throw new ReferenceError("this hasn't been initialised - super() hasn't been called");
            return !t || "object" != typeof t && "function" != typeof t ? n : t
        }, hf = "undefined" == typeof global ? self : global, cf = function ct(n, t, i, r) {
            var u = Object.getOwnPropertyDescriptor(n, t), f, e;
            return void 0 === u ? (f = Object.getPrototypeOf(n), null !== f && ct(f, t, i, r)) : "value" in u && u.writable ? u.value = i : (e = u.set, void 0 !== e && e.call(r, i)), i
        }, lf = function () {
            function n(n, t) {
                var r = [], u = !0, f = !1, e = void 0, o, i;
                try {
                    for (i = n[Symbol.iterator](); !(u = (o = i.next()).done) && (r.push(o.value), !t || r.length !== t); u = !0) ;
                } catch (n) {
                    f = !0;
                    e = n
                } finally {
                    try {
                        !u && i.return && i.return()
                    } finally {
                        if (f) throw e;
                    }
                }
                return r
            }

            return function (t, i) {
                if (Array.isArray(t)) return t;
                if (Symbol.iterator in Object(t)) return n(t, i);
                throw new TypeError("Invalid attempt to destructure non-iterable instance");
            }
        }(), af = function (n, t) {
            if (Array.isArray(n)) return n;
            if (Symbol.iterator in Object(n)) {
                for (var r, i = [], u = n[Symbol.iterator](); !(r = u.next()).done && (i.push(r.value), !t || i.length !== t);) ;
                return i
            }
            throw new TypeError("Invalid attempt to destructure non-iterable instance");
        }, vf = function (n, t) {
            return Object.freeze(Object.defineProperties(n, {raw: {value: Object.freeze(t)}}))
        }, yf = function (n, t) {
            return n.raw = t, n
        }, pf = function (n, t, i) {
            if (n === i) throw new ReferenceError(t + " is not defined - temporal dead zone");
            return n
        }, wf = function (n) {
            return Array.isArray(n) ? n : Array.from(n)
        }, bf = function (n) {
            if (Array.isArray(n)) {
                for (var t = 0, i = Array(n.length); t < n.length; t++) i[t] = n[t];
                return i
            }
            return Array.from(n)
        }, y = Object.freeze({
            jsx: cu,
            asyncIterator: lu,
            asyncGenerator: au,
            asyncGeneratorDelegate: vu,
            asyncToGenerator: yu,
            classCallCheck: pu,
            createClass: wu,
            defineEnumerableProperties: bu,
            defaults: ku,
            defineProperty: rt,
            get: gu,
            inherits: nf,
            interopRequireDefault: rf,
            interopRequireWildcard: uf,
            newArrowCheck: ff,
            objectDestructuringEmpty: ef,
            objectWithoutProperties: of,
            possibleConstructorReturn: sf,
            selfGlobal: hf,
            set: cf,
            slicedToArray: lf,
            slicedToArrayLoose: af,
            taggedTemplateLiteral: vf,
            taggedTemplateLiteralLoose: yf,
            temporalRef: pf,
            temporalUndefined: {},
            toArray: wf,
            toConsumableArray: bf,
            "typeof": hu,
            "extends": du,
            "instanceof": tf
        }), ai = function () {
            var n = function () {
            };
            try {
                return Object.defineProperty(n, "a", {
                    get: function () {
                        return 1
                    }
                }), Object.defineProperty(n, "prototype", {writable: !1}), 1 === n.a && n.prototype instanceof Object
            } catch (n) {
                return !1
            }
        }(), vi = !ai && !Object.prototype.__defineGetter__, n = Object.prototype.hasOwnProperty,
        r = ai ? Object.defineProperty : function (t, i, r) {
            "get" in r && t.__defineGetter__ ? t.__defineGetter__(i, r.get) : (!n.call(t, i) || "value" in r) && (t[i] = r.value)
        }, p = Array.prototype.indexOf || function (n) {
            var i = this, t, r;
            if (!i.length) return -1;
            for (t = arguments[1] || 0, r = i.length; t < r; t++) if (i[t] === n) return t;
            return -1
        }, w = Object.create || function (t, i) {
            function e() {
            }

            var f = void 0, u;
            e.prototype = t;
            f = new e;
            for (u in i) n.call(i, u) && r(f, u, i[u]);
            return f
        }, d = Array.prototype.slice, yi = Array.prototype.concat, t = Array.prototype.push, l = Array.prototype.join,
        pi = Array.prototype.shift, st = Function.prototype.bind || function (n) {
            var t = this, i = d.call(arguments, 1);
            return 1 === t.length ? function () {
                return t.apply(n, yi.call(i, d.call(arguments)))
            } : function () {
                return t.apply(n, yi.call(i, d.call(arguments)))
            }
        }, u = w(null), ht = Math.random(), pt, wt, f, c;
    e.prototype = w(null);
    o.prototype = w(null);
    var wi = "(?:[a-z0-9]{5,8}|\\d[a-z0-9]{3})", bi = "[0-9a-wy-z]", ki = bi + "(?:-[a-z0-9]{2,8})+",
        di = "x(?:-[a-z0-9]{1,8})+",
        kf = "(?:[a-z]{2,3}(?:-[a-z]{3}(?:-[a-z]{3}){0,2})?|[a-z]{4}|[a-z]{5,8})(?:-[a-z]{4})?(?:-(?:[a-z]{2}|\\d{3}))?(?:-" + wi + ")*(?:-" + ki + ")*(?:-" + di + ")?",
        df = RegExp("^(?:" + kf + "|" + di + "|(?:(?:en-GB-oed|i-(?:ami|bnn|default|enochian|hak|klingon|lux|mingo|navajo|pwn|tao|tay|tsu)|sgn-(?:BE-FR|BE-NL|CH-DE))|(?:art-lojban|cel-gaulish|no-bok|no-nyn|zh-(?:guoyu|hakka|min|min-nan|xiang))))$", "i"),
        gf = RegExp("^(?!x).*?-(" + wi + ")-(?:\\w{4,8}-(?!x-))*\\1\\b", "i"),
        ne = RegExp("^(?!x).*?-(" + bi + ")-(?:\\w+-(?!x-))*\\1\\b", "i"), gi = RegExp("-" + ki, "ig"), vt = void 0,
        b = {
            tags: {
                "art-lojban": "jbo",
                "i-ami": "ami",
                "i-bnn": "bnn",
                "i-hak": "hak",
                "i-klingon": "tlh",
                "i-lux": "lb",
                "i-navajo": "nv",
                "i-pwn": "pwn",
                "i-tao": "tao",
                "i-tay": "tay",
                "i-tsu": "tsu",
                "no-bok": "nb",
                "no-nyn": "nn",
                "sgn-BE-FR": "sfb",
                "sgn-BE-NL": "vgt",
                "sgn-CH-DE": "sgg",
                "zh-guoyu": "cmn",
                "zh-hakka": "hak",
                "zh-min-nan": "nan",
                "zh-xiang": "hsn",
                "sgn-BR": "bzs",
                "sgn-CO": "csn",
                "sgn-DE": "gsg",
                "sgn-DK": "dsl",
                "sgn-ES": "ssp",
                "sgn-FR": "fsl",
                "sgn-GB": "bfi",
                "sgn-GR": "gss",
                "sgn-IE": "isg",
                "sgn-IT": "ise",
                "sgn-JP": "jsl",
                "sgn-MX": "mfs",
                "sgn-NI": "ncs",
                "sgn-NL": "dse",
                "sgn-NO": "nsl",
                "sgn-PT": "psr",
                "sgn-SE": "swl",
                "sgn-US": "ase",
                "sgn-ZA": "sfs",
                "zh-cmn": "cmn",
                "zh-cmn-Hans": "cmn-Hans",
                "zh-cmn-Hant": "cmn-Hant",
                "zh-gan": "gan",
                "zh-wuu": "wuu",
                "zh-yue": "yue"
            },
            subtags: {
                BU: "MM",
                DD: "DE",
                FX: "FR",
                TP: "TL",
                YD: "YE",
                ZR: "CD",
                heploc: "alalc97",
                "in": "id",
                iw: "he",
                ji: "yi",
                jw: "jv",
                mo: "ro",
                ayx: "nun",
                bjd: "drl",
                ccq: "rki",
                cjr: "mom",
                cka: "cmr",
                cmk: "xch",
                drh: "khk",
                drw: "prs",
                gav: "dev",
                hrr: "jal",
                ibi: "opa",
                kgh: "kml",
                lcq: "ppr",
                mst: "mry",
                myt: "mry",
                sca: "hle",
                tie: "ras",
                tkk: "twm",
                tlw: "weo",
                tnf: "prs",
                ybd: "rki",
                yma: "lrr"
            },
            extLang: {
                aao: ["aao", "ar"],
                abh: ["abh", "ar"],
                abv: ["abv", "ar"],
                acm: ["acm", "ar"],
                acq: ["acq", "ar"],
                acw: ["acw", "ar"],
                acx: ["acx", "ar"],
                acy: ["acy", "ar"],
                adf: ["adf", "ar"],
                ads: ["ads", "sgn"],
                aeb: ["aeb", "ar"],
                aec: ["aec", "ar"],
                aed: ["aed", "sgn"],
                aen: ["aen", "sgn"],
                afb: ["afb", "ar"],
                afg: ["afg", "sgn"],
                ajp: ["ajp", "ar"],
                apc: ["apc", "ar"],
                apd: ["apd", "ar"],
                arb: ["arb", "ar"],
                arq: ["arq", "ar"],
                ars: ["ars", "ar"],
                ary: ["ary", "ar"],
                arz: ["arz", "ar"],
                ase: ["ase", "sgn"],
                asf: ["asf", "sgn"],
                asp: ["asp", "sgn"],
                asq: ["asq", "sgn"],
                asw: ["asw", "sgn"],
                auz: ["auz", "ar"],
                avl: ["avl", "ar"],
                ayh: ["ayh", "ar"],
                ayl: ["ayl", "ar"],
                ayn: ["ayn", "ar"],
                ayp: ["ayp", "ar"],
                bbz: ["bbz", "ar"],
                bfi: ["bfi", "sgn"],
                bfk: ["bfk", "sgn"],
                bjn: ["bjn", "ms"],
                bog: ["bog", "sgn"],
                bqn: ["bqn", "sgn"],
                bqy: ["bqy", "sgn"],
                btj: ["btj", "ms"],
                bve: ["bve", "ms"],
                bvl: ["bvl", "sgn"],
                bvu: ["bvu", "ms"],
                bzs: ["bzs", "sgn"],
                cdo: ["cdo", "zh"],
                cds: ["cds", "sgn"],
                cjy: ["cjy", "zh"],
                cmn: ["cmn", "zh"],
                coa: ["coa", "ms"],
                cpx: ["cpx", "zh"],
                csc: ["csc", "sgn"],
                csd: ["csd", "sgn"],
                cse: ["cse", "sgn"],
                csf: ["csf", "sgn"],
                csg: ["csg", "sgn"],
                csl: ["csl", "sgn"],
                csn: ["csn", "sgn"],
                csq: ["csq", "sgn"],
                csr: ["csr", "sgn"],
                czh: ["czh", "zh"],
                czo: ["czo", "zh"],
                doq: ["doq", "sgn"],
                dse: ["dse", "sgn"],
                dsl: ["dsl", "sgn"],
                dup: ["dup", "ms"],
                ecs: ["ecs", "sgn"],
                esl: ["esl", "sgn"],
                esn: ["esn", "sgn"],
                eso: ["eso", "sgn"],
                eth: ["eth", "sgn"],
                fcs: ["fcs", "sgn"],
                fse: ["fse", "sgn"],
                fsl: ["fsl", "sgn"],
                fss: ["fss", "sgn"],
                gan: ["gan", "zh"],
                gds: ["gds", "sgn"],
                gom: ["gom", "kok"],
                gse: ["gse", "sgn"],
                gsg: ["gsg", "sgn"],
                gsm: ["gsm", "sgn"],
                gss: ["gss", "sgn"],
                gus: ["gus", "sgn"],
                hab: ["hab", "sgn"],
                haf: ["haf", "sgn"],
                hak: ["hak", "zh"],
                hds: ["hds", "sgn"],
                hji: ["hji", "ms"],
                hks: ["hks", "sgn"],
                hos: ["hos", "sgn"],
                hps: ["hps", "sgn"],
                hsh: ["hsh", "sgn"],
                hsl: ["hsl", "sgn"],
                hsn: ["hsn", "zh"],
                icl: ["icl", "sgn"],
                ils: ["ils", "sgn"],
                inl: ["inl", "sgn"],
                ins: ["ins", "sgn"],
                ise: ["ise", "sgn"],
                isg: ["isg", "sgn"],
                isr: ["isr", "sgn"],
                jak: ["jak", "ms"],
                jax: ["jax", "ms"],
                jcs: ["jcs", "sgn"],
                jhs: ["jhs", "sgn"],
                jls: ["jls", "sgn"],
                jos: ["jos", "sgn"],
                jsl: ["jsl", "sgn"],
                jus: ["jus", "sgn"],
                kgi: ["kgi", "sgn"],
                knn: ["knn", "kok"],
                kvb: ["kvb", "ms"],
                kvk: ["kvk", "sgn"],
                kvr: ["kvr", "ms"],
                kxd: ["kxd", "ms"],
                lbs: ["lbs", "sgn"],
                lce: ["lce", "ms"],
                lcf: ["lcf", "ms"],
                liw: ["liw", "ms"],
                lls: ["lls", "sgn"],
                lsg: ["lsg", "sgn"],
                lsl: ["lsl", "sgn"],
                lso: ["lso", "sgn"],
                lsp: ["lsp", "sgn"],
                lst: ["lst", "sgn"],
                lsy: ["lsy", "sgn"],
                ltg: ["ltg", "lv"],
                lvs: ["lvs", "lv"],
                lzh: ["lzh", "zh"],
                max: ["max", "ms"],
                mdl: ["mdl", "sgn"],
                meo: ["meo", "ms"],
                mfa: ["mfa", "ms"],
                mfb: ["mfb", "ms"],
                mfs: ["mfs", "sgn"],
                min: ["min", "ms"],
                mnp: ["mnp", "zh"],
                mqg: ["mqg", "ms"],
                mre: ["mre", "sgn"],
                msd: ["msd", "sgn"],
                msi: ["msi", "ms"],
                msr: ["msr", "sgn"],
                mui: ["mui", "ms"],
                mzc: ["mzc", "sgn"],
                mzg: ["mzg", "sgn"],
                mzy: ["mzy", "sgn"],
                nan: ["nan", "zh"],
                nbs: ["nbs", "sgn"],
                ncs: ["ncs", "sgn"],
                nsi: ["nsi", "sgn"],
                nsl: ["nsl", "sgn"],
                nsp: ["nsp", "sgn"],
                nsr: ["nsr", "sgn"],
                nzs: ["nzs", "sgn"],
                okl: ["okl", "sgn"],
                orn: ["orn", "ms"],
                ors: ["ors", "ms"],
                pel: ["pel", "ms"],
                pga: ["pga", "ar"],
                pks: ["pks", "sgn"],
                prl: ["prl", "sgn"],
                prz: ["prz", "sgn"],
                psc: ["psc", "sgn"],
                psd: ["psd", "sgn"],
                pse: ["pse", "ms"],
                psg: ["psg", "sgn"],
                psl: ["psl", "sgn"],
                pso: ["pso", "sgn"],
                psp: ["psp", "sgn"],
                psr: ["psr", "sgn"],
                pys: ["pys", "sgn"],
                rms: ["rms", "sgn"],
                rsi: ["rsi", "sgn"],
                rsl: ["rsl", "sgn"],
                sdl: ["sdl", "sgn"],
                sfb: ["sfb", "sgn"],
                sfs: ["sfs", "sgn"],
                sgg: ["sgg", "sgn"],
                sgx: ["sgx", "sgn"],
                shu: ["shu", "ar"],
                slf: ["slf", "sgn"],
                sls: ["sls", "sgn"],
                sqk: ["sqk", "sgn"],
                sqs: ["sqs", "sgn"],
                ssh: ["ssh", "ar"],
                ssp: ["ssp", "sgn"],
                ssr: ["ssr", "sgn"],
                svk: ["svk", "sgn"],
                swc: ["swc", "sw"],
                swh: ["swh", "sw"],
                swl: ["swl", "sgn"],
                syy: ["syy", "sgn"],
                tmw: ["tmw", "ms"],
                tse: ["tse", "sgn"],
                tsm: ["tsm", "sgn"],
                tsq: ["tsq", "sgn"],
                tss: ["tss", "sgn"],
                tsy: ["tsy", "sgn"],
                tza: ["tza", "sgn"],
                ugn: ["ugn", "sgn"],
                ugy: ["ugy", "sgn"],
                ukl: ["ukl", "sgn"],
                uks: ["uks", "sgn"],
                urk: ["urk", "ms"],
                uzn: ["uzn", "uz"],
                uzs: ["uzs", "uz"],
                vgt: ["vgt", "sgn"],
                vkk: ["vkk", "ms"],
                vkt: ["vkt", "ms"],
                vsi: ["vsi", "sgn"],
                vsl: ["vsl", "sgn"],
                vsv: ["vsv", "sgn"],
                wuu: ["wuu", "zh"],
                xki: ["xki", "sgn"],
                xml: ["xml", "sgn"],
                xmm: ["xmm", "ms"],
                xms: ["xms", "sgn"],
                yds: ["yds", "sgn"],
                ysl: ["ysl", "sgn"],
                yue: ["yue", "zh"],
                zib: ["zib", "sgn"],
                zlm: ["zlm", "ms"],
                zmi: ["zmi", "ms"],
                zsl: ["zsl", "sgn"],
                zsm: ["zsm", "ms"]
            }
        }, te = /^[A-Z]{3}$/, yt = /-u(?:-[0-9a-z]{2,8})+/gi, i = {};
    Object.defineProperty(i, "getCanonicalLocales", {enumerable: !1, configurable: !0, writable: !0, value: hr});
    pt = {
        BHD: 3,
        BYR: 0,
        XOF: 0,
        BIF: 0,
        XAF: 0,
        CLF: 4,
        CLP: 0,
        KMF: 0,
        DJF: 0,
        XPF: 0,
        GNF: 0,
        ISK: 0,
        IQD: 3,
        JPY: 0,
        JOD: 3,
        KRW: 0,
        KWD: 3,
        LYD: 3,
        OMR: 3,
        PYG: 0,
        RWF: 0,
        TND: 3,
        UGX: 0,
        UYI: 0,
        VUV: 0,
        VND: 0
    };
    r(i, "NumberFormat", {configurable: !0, writable: !0, value: fi});
    r(i.NumberFormat, "prototype", {writable: !1});
    u.NumberFormat = {"[[availableLocales]]": [], "[[relevantExtensionKeys]]": ["nu"], "[[localeData]]": {}};
    r(i.NumberFormat, "supportedLocalesOf", {
        configurable: !0, writable: !0, value: st.call(function (t) {
            if (!n.call(this, "[[availableLocales]]")) throw new TypeError("supportedLocalesOf() is not a constructor");
            var i = g(), r = arguments[1], u = this["[[availableLocales]]"], f = nt(t);
            return i(), ui(u, f, r)
        }, u.NumberFormat)
    });
    r(i.NumberFormat.prototype, "format", {configurable: !0, get: ei});
    Object.defineProperty(i.NumberFormat.prototype, "formatToParts", {
        configurable: !0,
        enumerable: !1,
        writable: !0,
        value: ar
    });
    wt = {
        arab: ["٠", "١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩"],
        arabext: ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"],
        bali: ["᭐", "᭑", "᭒", "᭓", "᭔", "᭕", "᭖", "᭗", "᭘", "᭙"],
        beng: ["০", "১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯"],
        deva: ["०", "१", "२", "३", "४", "५", "६", "७", "८", "९"],
        fullwide: ["０", "１", "２", "３", "４", "５", "６", "７", "８", "９"],
        gujr: ["૦", "૧", "૨", "૩", "૪", "૫", "૬", "૭", "૮", "૯"],
        guru: ["੦", "੧", "੨", "੩", "੪", "੫", "੬", "੭", "੮", "੯"],
        hanidec: ["〇", "一", "二", "三", "四", "五", "六", "七", "八", "九"],
        khmr: ["០", "១", "២", "៣", "៤", "៥", "៦", "៧", "៨", "៩"],
        knda: ["೦", "೧", "೨", "೩", "೪", "೫", "೬", "೭", "೮", "೯"],
        laoo: ["໐", "໑", "໒", "໓", "໔", "໕", "໖", "໗", "໘", "໙"],
        latn: ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"],
        limb: ["᥆", "᥇", "᥈", "᥉", "᥊", "᥋", "᥌", "᥍", "᥎", "᥏"],
        mlym: ["൦", "൧", "൨", "൩", "൪", "൫", "൬", "൭", "൮", "൯"],
        mong: ["᠐", "᠑", "᠒", "᠓", "᠔", "᠕", "᠖", "᠗", "᠘", "᠙"],
        mymr: ["၀", "၁", "၂", "၃", "၄", "၅", "၆", "၇", "၈", "၉"],
        orya: ["୦", "୧", "୨", "୩", "୪", "୫", "୬", "୭", "୮", "୯"],
        tamldec: ["௦", "௧", "௨", "௩", "௪", "௫", "௬", "௭", "௮", "௯"],
        telu: ["౦", "౧", "౨", "౩", "౪", "౫", "౬", "౭", "౮", "౯"],
        thai: ["๐", "๑", "๒", "๓", "๔", "๕", "๖", "๗", "๘", "๙"],
        tibt: ["༠", "༡", "༢", "༣", "༤", "༥", "༦", "༧", "༨", "༩"]
    };
    r(i.NumberFormat.prototype, "resolvedOptions", {
        configurable: !0, writable: !0, value: function () {
            var u = void 0, f = new e,
                r = ["locale", "numberingSystem", "style", "currency", "currencyDisplay", "minimumIntegerDigits", "minimumFractionDigits", "maximumFractionDigits", "minimumSignificantDigits", "maximumSignificantDigits", "useGrouping"],
                i = null !== this && "object" === y.typeof(this) && s(this), t, o;
            if (!i || !i["[[initializedNumberFormat]]"]) throw new TypeError("`this` value for resolvedOptions() is not an initialized Intl.NumberFormat object.");
            for (t = 0, o = r.length; t < o; t++) n.call(i, u = "[[" + r[t] + "]]") && (f[r[t]] = {
                value: i[u],
                writable: !0,
                configurable: !0,
                enumerable: !0
            });
            return w({}, f)
        }
    });
    var nr = /(?:[Eec]{1,6}|G{1,5}|[Qq]{1,5}|(?:[yYur]+|U{1,5})|[ML]{1,5}|d{1,2}|D{1,3}|F{1}|[abB]{1,5}|[hkHK]{1,2}|w{1,2}|W{1}|m{1,2}|s{1,2}|[zZOvVxX]{1,4})(?=([^']*'[^']*')*[^']*$)/g,
        ie = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, re = /[rqQASjJgwWIQq]/,
        a = ["era", "year", "month", "day", "weekday", "quarter"],
        v = ["hour", "minute", "second", "hour12", "timeZoneName"], bt = {
            second: {numeric: "s", "2-digit": "ss"},
            minute: {numeric: "m", "2-digit": "mm"},
            year: {numeric: "y", "2-digit": "yy"},
            day: {numeric: "d", "2-digit": "dd"},
            month: {numeric: "L", "2-digit": "LL", narrow: "LLLLL", short: "LLL", long: "LLLL"},
            weekday: {narrow: "ccccc", short: "ccc", long: "cccc"}
        }, ue = w(null, {narrow: {}, short: {}, long: {}});
    if (r(i, "DateTimeFormat", {
        configurable: !0,
        writable: !0,
        value: it
    }), r(it, "prototype", {writable: !1}), f = {
        weekday: ["narrow", "short", "long"],
        era: ["narrow", "short", "long"],
        year: ["2-digit", "numeric"],
        month: ["2-digit", "numeric", "narrow", "short", "long"],
        day: ["2-digit", "numeric"],
        hour: ["2-digit", "numeric"],
        minute: ["2-digit", "numeric"],
        second: ["2-digit", "numeric"],
        timeZoneName: ["short", "long"]
    }, u.DateTimeFormat = {
        "[[availableLocales]]": [],
        "[[relevantExtensionKeys]]": ["ca", "nu"],
        "[[localeData]]": {}
    }, r(i.DateTimeFormat, "supportedLocalesOf", {
        configurable: !0, writable: !0, value: st.call(function (t) {
            if (!n.call(this, "[[availableLocales]]")) throw new TypeError("supportedLocalesOf() is not a constructor");
            var i = g(), r = arguments[1], u = this["[[availableLocales]]"], f = nt(t);
            return i(), ui(u, f, r)
        }, u.NumberFormat)
    }), r(i.DateTimeFormat.prototype, "format", {
        configurable: !0,
        get: ci
    }), Object.defineProperty(i.DateTimeFormat.prototype, "formatToParts", {
        enumerable: !1,
        writable: !0,
        configurable: !0,
        value: fu
    }), r(i.DateTimeFormat.prototype, "resolvedOptions", {
        writable: !0, configurable: !0, value: function () {
            var u = void 0, f = new e,
                r = ["locale", "calendar", "numberingSystem", "timeZone", "hour12", "weekday", "era", "year", "month", "day", "hour", "minute", "second", "timeZoneName"],
                i = null !== this && "object" === y.typeof(this) && s(this), t, o;
            if (!i || !i["[[initializedDateTimeFormat]]"]) throw new TypeError("`this` value for resolvedOptions() is not an initialized Intl.DateTimeFormat object.");
            for (t = 0, o = r.length; t < o; t++) n.call(i, u = "[[" + r[t] + "]]") && (f[r[t]] = {
                value: i[u],
                writable: !0,
                configurable: !0,
                enumerable: !0
            });
            return w({}, f)
        }
    }), c = i.__localeSensitiveProtos = {Number: {}, Date: {}}, c.Number.toLocaleString = function () {
        if ("[object Number]" !== Object.prototype.toString.call(this)) throw new TypeError("`this` value must be a number for Number.prototype.toLocaleString()");
        return ut(new fi(arguments[0], arguments[1]), this)
    }, c.Date.toLocaleString = function () {
        var t, i, n, r;
        if ("[object Date]" !== Object.prototype.toString.call(this)) throw new TypeError("`this` value must be a Date instance for Date.prototype.toLocaleString()");
        return (t = +this, isNaN(t)) ? "Invalid Date" : (i = arguments[0], n = arguments[1], n = et(n, "any", "all"), r = new it(i, n), ot(r, t))
    }, c.Date.toLocaleDateString = function () {
        var t, i, n, r;
        if ("[object Date]" !== Object.prototype.toString.call(this)) throw new TypeError("`this` value must be a Date instance for Date.prototype.toLocaleDateString()");
        return (t = +this, isNaN(t)) ? "Invalid Date" : (i = arguments[0], n = arguments[1], n = et(n, "date", "date"), r = new it(i, n), ot(r, t))
    }, c.Date.toLocaleTimeString = function () {
        var t, i, n, r;
        if ("[object Date]" !== Object.prototype.toString.call(this)) throw new TypeError("`this` value must be a Date instance for Date.prototype.toLocaleTimeString()");
        return (t = +this, isNaN(t)) ? "Invalid Date" : (i = arguments[0], n = arguments[1], n = et(n, "time", "time"), r = new it(i, n), ot(r, t))
    }, r(i, "__applyLocaleSensitivePrototypes", {
        writable: !0, configurable: !0, value: function () {
            r(Number.prototype, "toLocaleString", {writable: !0, configurable: !0, value: c.Number.toLocaleString});
            r(Date.prototype, "toLocaleString", {writable: !0, configurable: !0, value: c.Date.toLocaleString});
            for (var t in c.Date) n.call(c.Date, t) && r(Date.prototype, t, {
                writable: !0,
                configurable: !0,
                value: c.Date[t]
            })
        }
    }), r(i, "__addLocaleData", {
        value: function (n) {
            if (!dt(n.locale)) throw new Error('Invalid language tag "' + n.locale + '" when calling __addLocaleData("' + n.locale + '", ...) to register new locale data.');
            su(n, n.locale)
        }
    }), r(i, "__disableRegExpRestore", {
        value: function () {
            u.disableRegExpRestore = !0
        }
    }), "undefined" == typeof Intl) try {
        window.Intl = i;
        i.__applyLocaleSensitivePrototypes()
    } catch (ct) {
    }
    return i
});
!function (n, t, i, r) {
    "use strict";

    function hi(n, t, i) {
        return setTimeout(ci(n, i), t)
    }

    function rt(n, t, i) {
        return Array.isArray(n) ? (v(n, i[t], i), !0) : !1
    }

    function v(n, t, i) {
        var u;
        if (n) if (n.forEach) n.forEach(t, i); else if (n.length !== r) for (u = 0; u < n.length;) t.call(i, n[u], u, n), u++; else for (u in n) n.hasOwnProperty(u) && t.call(i, n[u], u, n)
    }

    function fr(t, i, r) {
        var u = "DEPRECATED METHOD: " + i + "\n" + r + " AT \n";
        return function () {
            var i = new Error("get-stack-trace"),
                f = i && i.stack ? i.stack.replace(/^[^\(]+?[\n$]/gm, "").replace(/^\s+at\s+/gm, "").replace(/^Object.<anonymous>\s*\(/gm, "{anonymous}()@") : "Unknown Stack Trace",
                r = n.console && (n.console.warn || n.console.log);
            return r && r.call(n.console, u, f), t.apply(this, arguments)
        }
    }

    function o(n, t, i) {
        var r, u = t.prototype;
        r = n.prototype = Object.create(u);
        r.constructor = n;
        r._super = u;
        i && w(r, i)
    }

    function ci(n, t) {
        return function () {
            return n.apply(t, arguments)
        }
    }

    function li(n, t) {
        return typeof n == cf ? n.apply(t ? t[0] || r : r, t) : n
    }

    function er(n, t) {
        return n === r ? t : n
    }

    function pt(n, t, i) {
        v(bt(t), function (t) {
            n.addEventListener(t, i, !1)
        })
    }

    function wt(n, t, i) {
        v(bt(t), function (t) {
            n.removeEventListener(t, i, !1)
        })
    }

    function or(n, t) {
        for (; n;) {
            if (n == t) return !0;
            n = n.parentNode
        }
        return !1
    }

    function d(n, t) {
        return n.indexOf(t) > -1
    }

    function bt(n) {
        return n.trim().split(/\s+/g)
    }

    function ut(n, t, i) {
        if (n.indexOf && !i) return n.indexOf(t);
        for (var r = 0; r < n.length;) {
            if (i && n[r][i] == t || !i && n[r] === t) return r;
            r++
        }
        return -1
    }

    function kt(n) {
        return Array.prototype.slice.call(n, 0)
    }

    function sr(n, t, i) {
        for (var f, u = [], e = [], r = 0; r < n.length;) f = t ? n[r][t] : n[r], ut(e, f) < 0 && u.push(n[r]), e[r] = f, r++;
        return i && (u = t ? u.sort(function (n, i) {
            return n[t] > i[t]
        }) : u.sort()), u
    }

    function dt(n, t) {
        for (var i, u, e = t[0].toUpperCase() + t.slice(1), f = 0; f < dr.length;) {
            if (i = dr[f], u = i ? i + e : t, u in n) return u;
            f++
        }
        return r
    }

    function yu() {
        return af++
    }

    function hr(t) {
        var i = t.ownerDocument || t;
        return i.defaultView || i.parentWindow || n
    }

    function s(n, t) {
        var i = this;
        this.manager = n;
        this.callback = t;
        this.element = n.element;
        this.target = n.options.inputTarget;
        this.domHandler = function (t) {
            li(n.options.enable, [n]) && i.handler(t)
        };
        this.init()
    }

    function pu(n) {
        var i, t = n.options.inputClass;
        return new (i = t ? t : vf ? vi : yf ? ti : nu ? yi : ni)(n, wu)
    }

    function wu(n, t, i) {
        var r = i.pointers.length, o = i.changedPointers.length, s = t & f && r - o == 0, h = t & (u | e) && r - o == 0;
        i.isFirst = !!s;
        i.isFinal = !!h;
        s && (n.session = {});
        i.eventType = t;
        bu(n, i);
        n.emit("hammer.input", i);
        n.recognize(i);
        n.session.prevInput = i
    }

    function bu(n, t) {
        var i = n.session, f = t.pointers, o = f.length, r, e;
        i.firstInput || (i.firstInput = cr(t));
        o > 1 && !i.firstMultiple ? i.firstMultiple = cr(t) : 1 === o && (i.firstMultiple = !1);
        var s = i.firstInput, u = i.firstMultiple, h = u ? u.center : s.center, c = t.center = lr(f);
        t.timeStamp = nr();
        t.deltaTime = t.timeStamp - s.timeStamp;
        t.angle = ai(h, c);
        t.distance = gt(h, c);
        ku(i, t);
        t.offsetDirection = vr(t.deltaX, t.deltaY);
        r = ar(t.deltaTime, t.deltaX, t.deltaY);
        t.overallVelocityX = r.x;
        t.overallVelocityY = r.y;
        t.overallVelocity = g(r.x) > g(r.y) ? r.x : r.y;
        t.scale = u ? nf(u.pointers, f) : 1;
        t.rotation = u ? gu(u.pointers, f) : 0;
        t.maxPointers = i.prevInput ? t.pointers.length > i.prevInput.maxPointers ? t.pointers.length : i.prevInput.maxPointers : t.pointers.length;
        du(i, t);
        e = n.element;
        or(t.srcEvent.target, e) && (e = t.srcEvent.target);
        t.target = e
    }

    function ku(n, t) {
        var i = t.center, r = n.offsetDelta || {}, e = n.prevDelta || {}, o = n.prevInput || {};
        t.eventType !== f && o.eventType !== u || (e = n.prevDelta = {
            x: o.deltaX || 0,
            y: o.deltaY || 0
        }, r = n.offsetDelta = {x: i.x, y: i.y});
        t.deltaX = e.x + (i.x - r.x);
        t.deltaY = e.y + (i.y - r.y)
    }

    function du(n, t) {
        var f, o, s, h, i = n.lastInterval || t, c = t.timeStamp - i.timeStamp;
        if (t.eventType != e && (c > pf || i.velocity === r)) {
            var l = t.deltaX - i.deltaX, a = t.deltaY - i.deltaY, u = ar(c, l, a);
            o = u.x;
            s = u.y;
            f = g(u.x) > g(u.y) ? u.x : u.y;
            h = vr(l, a);
            n.lastInterval = t
        } else f = i.velocity, o = i.velocityX, s = i.velocityY, h = i.direction;
        t.velocity = f;
        t.velocityX = o;
        t.velocityY = s;
        t.direction = h
    }

    function cr(n) {
        for (var i = [], t = 0; t < n.pointers.length;) i[t] = {
            clientX: ft(n.pointers[t].clientX),
            clientY: ft(n.pointers[t].clientY)
        }, t++;
        return {timeStamp: nr(), pointers: i, center: lr(i), deltaX: n.deltaX, deltaY: n.deltaY}
    }

    function lr(n) {
        var t = n.length;
        if (1 === t) return {x: ft(n[0].clientX), y: ft(n[0].clientY)};
        for (var r = 0, u = 0, i = 0; t > i;) r += n[i].clientX, u += n[i].clientY, i++;
        return {x: ft(r / t), y: ft(u / t)}
    }

    function ar(n, t, i) {
        return {x: t / n || 0, y: i / n || 0}
    }

    function vr(n, t) {
        return n === t ? fi : g(n) >= g(t) ? 0 > n ? st : ht : 0 > t ? ct : lt
    }

    function gt(n, t, i) {
        i || (i = iu);
        var r = t[i[0]] - n[i[0]], u = t[i[1]] - n[i[1]];
        return Math.sqrt(r * r + u * u)
    }

    function ai(n, t, i) {
        i || (i = iu);
        var r = t[i[0]] - n[i[0]], u = t[i[1]] - n[i[1]];
        return 180 * Math.atan2(u, r) / Math.PI
    }

    function gu(n, t) {
        return ai(t[1], t[0], ei) + ai(n[1], n[0], ei)
    }

    function nf(n, t) {
        return gt(t[0], t[1], ei) / gt(n[0], n[1], ei)
    }

    function ni() {
        this.evEl = bf;
        this.evWin = kf;
        this.pressed = !1;
        s.apply(this, arguments)
    }

    function vi() {
        this.evEl = ru;
        this.evWin = uu;
        s.apply(this, arguments);
        this.store = this.manager.session.pointerEvents = []
    }

    function yr() {
        this.evTarget = te;
        this.evWin = ie;
        this.started = !1;
        s.apply(this, arguments)
    }

    function tf(n, t) {
        var i = kt(n.touches), r = kt(n.changedTouches);
        return t & (u | e) && (i = sr(i.concat(r), "identifier", !0)), [i, r]
    }

    function ti() {
        this.evTarget = eu;
        this.targetIds = {};
        s.apply(this, arguments)
    }

    function rf(n, t) {
        var r = kt(n.touches), o = this.targetIds;
        if (t & (f | nt) && 1 === r.length) return o[r[0].identifier] = !0, [r, r];
        var i, s, h = kt(n.changedTouches), c = [], l = this.target;
        if (s = r.filter(function (n) {
            return or(n.target, l)
        }), t === f) for (i = 0; i < s.length;) o[s[i].identifier] = !0, i++;
        for (i = 0; i < h.length;) o[h[i].identifier] && c.push(h[i]), t & (u | e) && delete o[h[i].identifier], i++;
        if (c.length) return [sr(s.concat(c), "identifier", !0), c]
    }

    function yi() {
        s.apply(this, arguments);
        var n = ci(this.handler, this);
        this.touch = new ti(this.manager, n);
        this.mouse = new ni(this.manager, n);
        this.primaryTouch = null;
        this.lastTouches = []
    }

    function uf(n, t) {
        n & f ? (this.primaryTouch = t.changedPointers[0].identifier, pr.call(this, t)) : n & (u | e) && pr.call(this, t)
    }

    function pr(n) {
        var t = n.changedPointers[0], i, r, u;
        t.identifier === this.primaryTouch && (i = {
            x: t.clientX,
            y: t.clientY
        }, this.lastTouches.push(i), r = this.lastTouches, u = function () {
            var n = r.indexOf(i);
            n > -1 && r.splice(n, 1)
        }, setTimeout(u, ou))
    }

    function ff(n) {
        for (var r = n.srcEvent.clientX, u = n.srcEvent.clientY, t = 0; t < this.lastTouches.length; t++) {
            var i = this.lastTouches[t], f = Math.abs(r - i.x), e = Math.abs(u - i.y);
            if (ir >= f && ir >= e) return !0
        }
        return !1
    }

    function pi(n, t) {
        this.manager = n;
        this.set(t)
    }

    function ef(n) {
        if (d(n, it)) return it;
        var t = d(n, at), i = d(n, vt);
        return t && i ? it : t || i ? t ? at : vt : d(n, rr) ? rr : lu
    }

    function of() {
        if (!hu) return !1;
        var t = {}, i = n.CSS && n.CSS.supports;
        return ["auto", "manipulation", "pan-y", "pan-x", "pan-x pan-y", "none"].forEach(function (r) {
            t[r] = i ? n.CSS.supports("touch-action", r) : !0
        }), t
    }

    function y(n) {
        this.options = w({}, this.defaults, n || {});
        this.id = yu();
        this.manager = null;
        this.options.enable = er(this.options.enable, !0);
        this.state = si;
        this.simultaneous = {};
        this.requireFail = []
    }

    function wr(n) {
        return n & yt ? "cancel" : n & k ? "end" : n & et ? "move" : n & h ? "start" : ""
    }

    function br(n) {
        return n == lt ? "down" : n == ct ? "up" : n == st ? "left" : n == ht ? "right" : ""
    }

    function ii(n, t) {
        var i = t.manager;
        return i ? i.get(n) : n
    }

    function c() {
        y.apply(this, arguments)
    }

    function ri() {
        c.apply(this, arguments);
        this.pX = null;
        this.pY = null
    }

    function wi() {
        c.apply(this, arguments)
    }

    function bi() {
        y.apply(this, arguments);
        this._timer = null;
        this._input = null
    }

    function ki() {
        c.apply(this, arguments)
    }

    function di() {
        c.apply(this, arguments)
    }

    function ui() {
        y.apply(this, arguments);
        this.pTime = !1;
        this.pCenter = !1;
        this._timer = null;
        this._input = null;
        this.count = 0
    }

    function p(n, t) {
        return t = t || {}, t.recognizers = er(t.recognizers, p.defaults.preset), new gi(n, t)
    }

    function gi(n, t) {
        this.options = w({}, p.defaults, t || {});
        this.options.inputTarget = this.options.inputTarget || n;
        this.handlers = {};
        this.session = {};
        this.recognizers = [];
        this.oldCssProps = {};
        this.element = n;
        this.input = pu(this);
        this.touchAction = new pi(this, this.options.touchAction);
        kr(this, !0);
        v(this.options.recognizers, function (n) {
            var t = this.add(new n[0](n[1]));
            n[2] && t.recognizeWith(n[2]);
            n[3] && t.requireFailure(n[3])
        }, this)
    }

    function kr(n, t) {
        var r = n.element, i;
        r.style && (v(n.options.cssProps, function (u, f) {
            i = dt(r.style, f);
            t ? (n.oldCssProps[i] = r.style[i], r.style[i] = u) : r.style[i] = n.oldCssProps[i] || ""
        }), t || (n.oldCssProps = {}))
    }

    function sf(n, i) {
        var r = t.createEvent("Event");
        r.initEvent(n, !0, !0);
        r.gesture = i;
        i.target.dispatchEvent(r)
    }

    var w, dr = ["", "webkit", "Moz", "MS", "ms", "o"], hf = t.createElement("div"), cf = "function", ft = Math.round,
        g = Math.abs, nr = Date.now, fu, eu, ou, ir, au, ur, vu;
    w = "function" != typeof Object.assign ? function (n) {
        var f, i, t, u;
        if (n === r || null === n) throw new TypeError("Cannot convert undefined or null to object");
        for (f = Object(n), i = 1; i < arguments.length; i++) if (t = arguments[i], t !== r && null !== t) for (u in t) t.hasOwnProperty(u) && (f[u] = t[u]);
        return f
    } : Object.assign;
    var gr = fr(function (n, t, i) {
            for (var f = Object.keys(t), u = 0; u < f.length;) (!i || i && n[f[u]] === r) && (n[f[u]] = t[f[u]]), u++;
            return n
        }, "extend", "Use `assign`."), lf = fr(function (n, t) {
            return gr(n, t, !0)
        }, "merge", "Use `assign`."), af = 1, nu = "ontouchstart" in n, vf = dt(n, "PointerEvent") !== r,
        yf = nu && /mobile|tablet|ip(ad|hone|od)|android/i.test(navigator.userAgent), ot = "touch", tr = "mouse",
        pf = 25, f = 1, nt = 2, u = 4, e = 8, fi = 1, st = 2, ht = 4, ct = 8, lt = 16, l = st | ht, tt = ct | lt,
        tu = l | tt, iu = ["x", "y"], ei = ["clientX", "clientY"];
    s.prototype = {
        handler: function () {
        }, init: function () {
            this.evEl && pt(this.element, this.evEl, this.domHandler);
            this.evTarget && pt(this.target, this.evTarget, this.domHandler);
            this.evWin && pt(hr(this.element), this.evWin, this.domHandler)
        }, destroy: function () {
            this.evEl && wt(this.element, this.evEl, this.domHandler);
            this.evTarget && wt(this.target, this.evTarget, this.domHandler);
            this.evWin && wt(hr(this.element), this.evWin, this.domHandler)
        }
    };
    var wf = {mousedown: f, mousemove: nt, mouseup: u}, bf = "mousedown", kf = "mousemove mouseup";
    o(ni, s, {
        handler: function (n) {
            var t = wf[n.type];
            t & f && 0 === n.button && (this.pressed = !0);
            t & nt && 1 !== n.which && (t = u);
            this.pressed && (t & u && (this.pressed = !1), this.callback(this.manager, t, {
                pointers: [n],
                changedPointers: [n],
                pointerType: tr,
                srcEvent: n
            }))
        }
    });
    var df = {pointerdown: f, pointermove: nt, pointerup: u, pointercancel: e, pointerout: e},
        gf = {2: ot, 3: "pen", 4: tr, 5: "kinect"}, ru = "pointerdown", uu = "pointermove pointerup pointercancel";
    n.MSPointerEvent && !n.PointerEvent && (ru = "MSPointerDown", uu = "MSPointerMove MSPointerUp MSPointerCancel");
    o(vi, s, {
        handler: function (n) {
            var t = this.store, o = !1, h = n.type.toLowerCase().replace("ms", ""), r = df[h],
                s = gf[n.pointerType] || n.pointerType, c = s == ot, i = ut(t, n.pointerId, "pointerId");
            r & f && (0 === n.button || c) ? 0 > i && (t.push(n), i = t.length - 1) : r & (u | e) && (o = !0);
            0 > i || (t[i] = n, this.callback(this.manager, r, {
                pointers: t,
                changedPointers: [n],
                pointerType: s,
                srcEvent: n
            }), o && t.splice(i, 1))
        }
    });
    var ne = {touchstart: f, touchmove: nt, touchend: u, touchcancel: e}, te = "touchstart",
        ie = "touchstart touchmove touchend touchcancel";
    o(yr, s, {
        handler: function (n) {
            var i = ne[n.type], t;
            (i === f && (this.started = !0), this.started) && (t = tf.call(this, n, i), i & (u | e) && t[0].length - t[1].length == 0 && (this.started = !1), this.callback(this.manager, i, {
                pointers: t[0],
                changedPointers: t[1],
                pointerType: ot,
                srcEvent: n
            }))
        }
    });
    fu = {touchstart: f, touchmove: nt, touchend: u, touchcancel: e};
    eu = "touchstart touchmove touchend touchcancel";
    o(ti, s, {
        handler: function (n) {
            var i = fu[n.type], t = rf.call(this, n, i);
            t && this.callback(this.manager, i, {pointers: t[0], changedPointers: t[1], pointerType: ot, srcEvent: n})
        }
    });
    ou = 2500;
    ir = 25;
    o(yi, s, {
        handler: function (n, t, i) {
            var u = i.pointerType == ot, r = i.pointerType == tr;
            if (!(r && i.sourceCapabilities && i.sourceCapabilities.firesTouchEvents)) {
                if (u) uf.call(this, t, i); else if (r && ff.call(this, i)) return;
                this.callback(n, t, i)
            }
        }, destroy: function () {
            this.touch.destroy();
            this.mouse.destroy()
        }
    });
    var su = dt(hf.style, "touchAction"), hu = su !== r, cu = "compute", lu = "auto", rr = "manipulation", it = "none",
        at = "pan-x", vt = "pan-y", oi = of();
    pi.prototype = {
        set: function (n) {
            n == cu && (n = this.compute());
            hu && this.manager.element.style && oi[n] && (this.manager.element.style[su] = n);
            this.actions = n.toLowerCase().trim()
        }, update: function () {
            this.set(this.manager.options.touchAction)
        }, compute: function () {
            var n = [];
            return v(this.manager.recognizers, function (t) {
                li(t.options.enable, [t]) && (n = n.concat(t.getTouchAction()))
            }), ef(n.join(" "))
        }, preventDefaults: function (n) {
            var i = n.srcEvent, r = n.offsetDirection;
            if (this.manager.session.prevented) return void i.preventDefault();
            var t = this.actions, u = d(t, it) && !oi[it], f = d(t, vt) && !oi[vt], e = d(t, at) && !oi[at];
            if (u) {
                var o = 1 === n.pointers.length, s = n.distance < 2, h = n.deltaTime < 250;
                if (o && s && h) return
            }
            if (!e || !f) return u || f && r & l || e && r & tt ? this.preventSrc(i) : void 0
        }, preventSrc: function (n) {
            this.manager.session.prevented = !0;
            n.preventDefault()
        }
    };
    var si = 1, h = 2, et = 4, k = 8, b = k, yt = 16, a = 32;
    y.prototype = {
        defaults: {}, set: function (n) {
            return w(this.options, n), this.manager && this.manager.touchAction.update(), this
        }, recognizeWith: function (n) {
            if (rt(n, "recognizeWith", this)) return this;
            var t = this.simultaneous;
            return n = ii(n, this), t[n.id] || (t[n.id] = n, n.recognizeWith(this)), this
        }, dropRecognizeWith: function (n) {
            return rt(n, "dropRecognizeWith", this) ? this : (n = ii(n, this), delete this.simultaneous[n.id], this)
        }, requireFailure: function (n) {
            if (rt(n, "requireFailure", this)) return this;
            var t = this.requireFail;
            return n = ii(n, this), -1 === ut(t, n) && (t.push(n), n.requireFailure(this)), this
        }, dropRequireFailure: function (n) {
            if (rt(n, "dropRequireFailure", this)) return this;
            n = ii(n, this);
            var t = ut(this.requireFail, n);
            return t > -1 && this.requireFail.splice(t, 1), this
        }, hasRequireFailures: function () {
            return this.requireFail.length > 0
        }, canRecognizeWith: function (n) {
            return !!this.simultaneous[n.id]
        }, emit: function (n) {
            function t(t) {
                i.manager.emit(t, n)
            }

            var i = this, r = this.state;
            k > r && t(i.options.event + wr(r));
            t(i.options.event);
            n.additionalEvent && t(n.additionalEvent);
            r >= k && t(i.options.event + wr(r))
        }, tryEmit: function (n) {
            return this.canEmit() ? this.emit(n) : void (this.state = a)
        }, canEmit: function () {
            for (var n = 0; n < this.requireFail.length;) {
                if (!(this.requireFail[n].state & (a | si))) return !1;
                n++
            }
            return !0
        }, recognize: function (n) {
            var t = w({}, n);
            return li(this.options.enable, [this, t]) ? (this.state & (b | yt | a) && (this.state = si), this.state = this.process(t), void (this.state & (h | et | k | yt) && this.tryEmit(t))) : (this.reset(), void (this.state = a))
        }, process: function () {
        }, getTouchAction: function () {
        }, reset: function () {
        }
    };
    o(c, y, {
        defaults: {pointers: 1}, attrTest: function (n) {
            var t = this.options.pointers;
            return 0 === t || n.pointers.length === t
        }, process: function (n) {
            var t = this.state, i = n.eventType, r = t & (h | et), f = this.attrTest(n);
            return r && (i & e || !f) ? t | yt : r || f ? i & u ? t | k : t & h ? t | et : h : a
        }
    });
    o(ri, c, {
        defaults: {event: "pan", threshold: 10, pointers: 1, direction: tu}, getTouchAction: function () {
            var t = this.options.direction, n = [];
            return t & l && n.push(vt), t & tt && n.push(at), n
        }, directionTest: function (n) {
            var i = this.options, r = !0, u = n.distance, t = n.direction, f = n.deltaX, e = n.deltaY;
            return t & i.direction || (i.direction & l ? (t = 0 === f ? fi : 0 > f ? st : ht, r = f != this.pX, u = Math.abs(n.deltaX)) : (t = 0 === e ? fi : 0 > e ? ct : lt, r = e != this.pY, u = Math.abs(n.deltaY))), n.direction = t, r && u > i.threshold && t & i.direction
        }, attrTest: function (n) {
            return c.prototype.attrTest.call(this, n) && (this.state & h || !(this.state & h) && this.directionTest(n))
        }, emit: function (n) {
            this.pX = n.deltaX;
            this.pY = n.deltaY;
            var t = br(n.direction);
            t && (n.additionalEvent = this.options.event + t);
            this._super.emit.call(this, n)
        }
    });
    o(wi, c, {
        defaults: {event: "pinch", threshold: 0, pointers: 2}, getTouchAction: function () {
            return [it]
        }, attrTest: function (n) {
            return this._super.attrTest.call(this, n) && (Math.abs(n.scale - 1) > this.options.threshold || this.state & h)
        }, emit: function (n) {
            if (1 !== n.scale) {
                var t = n.scale < 1 ? "in" : "out";
                n.additionalEvent = this.options.event + t
            }
            this._super.emit.call(this, n)
        }
    });
    o(bi, y, {
        defaults: {event: "press", pointers: 1, time: 251, threshold: 9}, getTouchAction: function () {
            return [lu]
        }, process: function (n) {
            var t = this.options, i = n.pointers.length === t.pointers, r = n.distance < t.threshold,
                o = n.deltaTime > t.time;
            if (this._input = n, !r || !i || n.eventType & (u | e) && !o) this.reset(); else if (n.eventType & f) this.reset(), this._timer = hi(function () {
                this.state = b;
                this.tryEmit()
            }, t.time, this); else if (n.eventType & u) return b;
            return a
        }, reset: function () {
            clearTimeout(this._timer)
        }, emit: function (n) {
            this.state === b && (n && n.eventType & u ? this.manager.emit(this.options.event + "up", n) : (this._input.timeStamp = nr(), this.manager.emit(this.options.event, this._input)))
        }
    });
    o(ki, c, {
        defaults: {event: "rotate", threshold: 0, pointers: 2}, getTouchAction: function () {
            return [it]
        }, attrTest: function (n) {
            return this._super.attrTest.call(this, n) && (Math.abs(n.rotation) > this.options.threshold || this.state & h)
        }
    });
    o(di, c, {
        defaults: {event: "swipe", threshold: 10, velocity: .3, direction: l | tt, pointers: 1},
        getTouchAction: function () {
            return ri.prototype.getTouchAction.call(this)
        },
        attrTest: function (n) {
            var t, i = this.options.direction;
            return i & (l | tt) ? t = n.overallVelocity : i & l ? t = n.overallVelocityX : i & tt && (t = n.overallVelocityY), this._super.attrTest.call(this, n) && i & n.offsetDirection && n.distance > this.options.threshold && n.maxPointers == this.options.pointers && g(t) > this.options.velocity && n.eventType & u
        },
        emit: function (n) {
            var t = br(n.offsetDirection);
            t && this.manager.emit(this.options.event + t, n);
            this.manager.emit(this.options.event, n)
        }
    });
    o(ui, y, {
        defaults: {event: "tap", pointers: 1, taps: 1, interval: 300, time: 250, threshold: 9, posThreshold: 10},
        getTouchAction: function () {
            return [rr]
        },
        process: function (n) {
            var t = this.options, o = n.pointers.length === t.pointers, s = n.distance < t.threshold,
                c = n.deltaTime < t.time, i, r, e;
            if (this.reset(), n.eventType & f && 0 === this.count) return this.failTimeout();
            if (s && c && o) {
                if (n.eventType != u) return this.failTimeout();
                if (i = this.pTime ? n.timeStamp - this.pTime < t.interval : !0, r = !this.pCenter || gt(this.pCenter, n.center) < t.posThreshold, this.pTime = n.timeStamp, this.pCenter = n.center, r && i ? this.count += 1 : this.count = 1, this._input = n, e = this.count % t.taps, 0 === e) return this.hasRequireFailures() ? (this._timer = hi(function () {
                    this.state = b;
                    this.tryEmit()
                }, t.interval, this), h) : b
            }
            return a
        },
        failTimeout: function () {
            return this._timer = hi(function () {
                this.state = a
            }, this.options.interval, this), a
        },
        reset: function () {
            clearTimeout(this._timer)
        },
        emit: function () {
            this.state == b && (this._input.tapCount = this.count, this.manager.emit(this.options.event, this._input))
        }
    });
    p.VERSION = "2.0.8";
    p.defaults = {
        domEvents: !1,
        touchAction: cu,
        enable: !0,
        inputTarget: null,
        inputClass: null,
        preset: [[ki, {enable: !1}], [wi, {enable: !1}, ["rotate"]], [di, {direction: l}], [ri, {direction: l}, ["swipe"]], [ui], [ui, {
            event: "doubletap",
            taps: 2
        }, ["tap"]], [bi]],
        cssProps: {
            userSelect: "none",
            touchSelect: "none",
            touchCallout: "none",
            contentZooming: "none",
            userDrag: "none",
            tapHighlightColor: "rgba(0,0,0,0)"
        }
    };
    au = 1;
    ur = 2;
    gi.prototype = {
        set: function (n) {
            return w(this.options, n), n.touchAction && this.touchAction.update(), n.inputTarget && (this.input.destroy(), this.input.target = n.inputTarget, this.input.init()), this
        }, stop: function (n) {
            this.session.stopped = n ? ur : au
        }, recognize: function (n) {
            var r = this.session, i, f, t, u;
            if (!r.stopped) for (this.touchAction.preventDefaults(n), f = this.recognizers, t = r.curRecognizer, (!t || t && t.state & b) && (t = r.curRecognizer = null), u = 0; u < f.length;) i = f[u], r.stopped === ur || t && i != t && !i.canRecognizeWith(t) ? i.reset() : i.recognize(n), !t && i.state & (h | et | k) && (t = r.curRecognizer = i), u++
        }, get: function (n) {
            if (n instanceof y) return n;
            for (var i = this.recognizers, t = 0; t < i.length; t++) if (i[t].options.event == n) return i[t];
            return null
        }, add: function (n) {
            if (rt(n, "add", this)) return this;
            var t = this.get(n.options.event);
            return t && this.remove(t), this.recognizers.push(n), n.manager = this, this.touchAction.update(), n
        }, remove: function (n) {
            if (rt(n, "remove", this)) return this;
            if (n = this.get(n)) {
                var t = this.recognizers, i = ut(t, n);
                -1 !== i && (t.splice(i, 1), this.touchAction.update())
            }
            return this
        }, on: function (n, t) {
            if (n !== r && t !== r) {
                var i = this.handlers;
                return v(bt(n), function (n) {
                    i[n] = i[n] || [];
                    i[n].push(t)
                }), this
            }
        }, off: function (n, t) {
            if (n !== r) {
                var i = this.handlers;
                return v(bt(n), function (n) {
                    t ? i[n] && i[n].splice(ut(i[n], t), 1) : delete i[n]
                }), this
            }
        }, emit: function (n, t) {
            var i, r;
            if (this.options.domEvents && sf(n, t), i = this.handlers[n] && this.handlers[n].slice(), i && i.length) for (t.type = n, t.preventDefault = function () {
                t.srcEvent.preventDefault()
            }, r = 0; r < i.length;) i[r](t), r++
        }, destroy: function () {
            this.element && kr(this, !1);
            this.handlers = {};
            this.session = {};
            this.input.destroy();
            this.element = null
        }
    };
    w(p, {
        INPUT_START: f,
        INPUT_MOVE: nt,
        INPUT_END: u,
        INPUT_CANCEL: e,
        STATE_POSSIBLE: si,
        STATE_BEGAN: h,
        STATE_CHANGED: et,
        STATE_ENDED: k,
        STATE_RECOGNIZED: b,
        STATE_CANCELLED: yt,
        STATE_FAILED: a,
        DIRECTION_NONE: fi,
        DIRECTION_LEFT: st,
        DIRECTION_RIGHT: ht,
        DIRECTION_UP: ct,
        DIRECTION_DOWN: lt,
        DIRECTION_HORIZONTAL: l,
        DIRECTION_VERTICAL: tt,
        DIRECTION_ALL: tu,
        Manager: gi,
        Input: s,
        TouchAction: pi,
        TouchInput: ti,
        MouseInput: ni,
        PointerEventInput: vi,
        TouchMouseInput: yi,
        SingleTouchInput: yr,
        Recognizer: y,
        AttrRecognizer: c,
        Tap: ui,
        Pan: ri,
        Swipe: di,
        Pinch: wi,
        Rotate: ki,
        Press: bi,
        on: pt,
        off: wt,
        each: v,
        merge: lf,
        extend: gr,
        assign: w,
        inherit: o,
        bindFn: ci,
        prefixed: dt
    });
    vu = "undefined" != typeof n ? n : "undefined" != typeof self ? self : {};
    vu.Hammer = p;
    "function" == typeof define && define.amd ? define(function () {
        return p
    }) : "undefined" != typeof module && module.exports ? module.exports = p : n[i] = p
}(window, document, "Hammer");
adaptVersionMaxWidth = 599;
typeof baseHelper == "undefined" && (baseHelper = {});
baseHelper.init = function () {
    var n = this;
    n.checkDdlEvents()
};
baseHelper.addEventToDDL = function (n, t, i, r) {
    typeof window.digitalData == "undefined" && (window.digitalData = {});
    typeof window.digitalData.events == "undefined" && (window.digitalData.events = []);
    n && t && (r ? window.digitalData.events.push({
        category: n,
        name: t,
        action: r,
        label: i
    }) : i ? window.digitalData.events.push({
        category: n,
        name: t,
        label: i
    }) : window.digitalData.events.push({category: n, name: t}))
};
baseHelper.addEventObjectToDDL = function (n) {
    typeof window.digitalData == "undefined" && (window.digitalData = {});
    typeof window.digitalData.events == "undefined" && (window.digitalData.events = []);
    window.digitalData.events.push(n)
};
baseHelper.createEventDDL = function (n, t, i, r) {
    var u = {};
    return n && t && (u = r ? {category: n, name: t, action: r, label: i} : i ? {
        category: n,
        name: t,
        label: i
    } : {category: n, name: t}), u
};
baseHelper.bindSmsCodeToSingUpStepDDL = function () {
    typeof window.digitalData == "undefined" && (window.digitalData = {});
    typeof window.digitalData.page == "undefined" && (window.digitalData.page = {});
    window.digitalData.page.signupStep = "SmsCode"
};
baseHelper.checkDdlEvents = function () {
    var n = $.cookie("ddl_events");
    typeof n != "undefined" && n && (eventArray = n.split(";"), eventArray.forEach(function (n) {
        var t = n, i = "undefined";
        switch (t) {
            case"Logged In":
            case"Registered":
            case"Password Recovered":
                i = "Auth"
        }
        baseHelper.addEventToDDL(i, t)
    }), $.removeCookie("ddl_events", {path: "/"}))
};
$(function () {
    baseHelper.init()
});
typeof headerHelper == "undefined" && (headerHelper = {});
headerHelper.init = function () {
    headerHelper.bindSettingsEvents();
    headerHelper.bindShowRegionsList();
    headerHelper.bindRegionConfirmation()
};
headerHelper.bindSettingsEvents = function () {
    if ($("#headerSettings").length) {
        $(".headerAuth__wrapper").on("click.bindSettingsEvents", function () {
            $(this).toggleClass("headerAuth__wrapper--active")
        });
        $("#headerSettings").on("click.bindSettingsEvents", function (n) {
            n = n || event;
            n.stopPropagation()
        })
    }
};
headerHelper.bindShowRegionsList = function () {
    var n = this;
    $(".headerRegionSelection__region", n.$headerMenuOpener).off("click.selectRegionHelper").on("click.selectRegionHelper", function (t) {
        t = t || window.event;
        var i = $(this);
        n.showRegionsList(t)
    })
};
headerHelper.showRegionsList = function (n) {
    n = n || window.event;
    var t = this;
    typeof selectRegionHelper == "undefined" ? ($("body").mask(), $.ajax({
        url: "/SelectRegion/desktop",
        type: "POST",
        dataType: "html",
        success: function (n) {
            var t = $(n).find(".selectRegion__wrapper").addBack(".selectRegion__wrapper");
            t ? ($("body").unmask(), $("body").append(t), selectRegionHelper.init()) : location.href = "/entrance"
        }
    })) : selectRegionHelper.toggle(n)
};
headerHelper.bindRegionConfirmation = function () {
    function i() {
        n.$headerMenuOpener.removeClass("headerRegionSelection__wrapper--confirmation");
        n.$headerMenuOpener.off("click", i);
        t.remove()
    }

    var n = this, t;
    if ((t = $(".headerRegionConfirm__wrapper")).length) {
        n.$headerMenuOpener = $("#headerRegionSelection");
        $("#headerRegionConfirm__ConfirmButton", t).on("click.selectRegionHelper", function () {
            var n = $(this).data("region-id");
            i();
            $.removeCookie("kaspi-payment-region");
            $.cookie("kaspi-payment-region", n, {expires: 365, path: "/"});
            $.removeCookie("kaspi-trusted-region-id");
            $.cookie("kaspi-trusted-region-id", n, {expires: 365, path: "/"});
            location.reload()
        });
        $("#headerRegionConfirm__CancelButton", t).on("click.selectRegionHelper", function (t) {
            t = t || window.event;
            n.showRegionsList(t);
            i()
        });
        n.$headerMenuOpener.on("click", function () {
            i()
        });
        t.on("click.selectRegionHelper", function (n) {
            n = n || window.event;
            typeof n.stopPropagation == "function" && n.stopPropagation()
        });
        $.cookie("kaspi-region-confirm-shown", "true", {expires: 365, path: "/"})
    }
};
$(function () {
    headerHelper.init()
});
typeof footerHelper == "undefined" && (footerHelper = {});
footerHelper.init = function () {
    var n = this;
    (n.$wrapper = $(".footer__wrapper")).length && footerHelper.bindChangeLocale()
};
footerHelper.bindChangeLocale = function () {
    var n = this;
    $("#footerSwitchLocale").off("click.kaspiMenu").on("click.kaspiMenu", function (n) {
        n = n || window.event;
        n.preventDefault();
        n.stopPropagation();
        var t = $(this), i = t.data("locale");
        $.ajax({
            url: "/SwitchLocale/" + i, type: "POST", dataType: "json", success: function (n) {
                n.status == "OK" && location.reload()
            }
        }).always(function () {
        })
    })
};
$(function () {
    footerHelper.init()
});
sendAppLinkHelper || (sendAppLinkHelper = {});
sendAppLinkHelper.init = function () {
    var n = this;
    (n.$wrapper = $("#SendAppLink"), n.$wrapper.length) && (n.$input = $("#txtMobile"), n.bindShowPopup(), n.bindHidePopup(), n.bindInputmask(), n.bindOnSubmit(), n.bindHideErrorOnChange())
};
sendAppLinkHelper.bindShowPopup = function () {
    var n = this;
    $("#SendToMobileLink").off("click.sendAppLinkHelper").on("click.sendAppLinkHelper", function (t) {
        t.preventDefault();
        n.showPopup();
        n.setFocusToInput(n.$input)
    })
};
sendAppLinkHelper.showPopup = function () {
    var n = this;
    n.$wrapper.fadeIn(200)
};
sendAppLinkHelper.bindHidePopup = function () {
    var n = this;
    $(".sendAppLink__close", n.$wrapper).off("click.sendAppLinkHelper").on("click.sendAppLinkHelper", function () {
        sendAppLinkHelper.hidePopup()
    })
};
sendAppLinkHelper.hidePopup = function () {
    var n = this;
    n.$wrapper.fadeOut(200)
};
sendAppLinkHelper.bindInputmask = function () {
    var n = this;
    n.$input.inputmask("+7 (999) 999-99-99", {placeholder: " "})
};
sendAppLinkHelper.setFocusToInput = function (n) {
    var t = this;
    n.focus()
};
sendAppLinkHelper.bindOnSubmit = function () {
    var n = this;
    $(".sendAppLink__wrapper", n.$wrapper).off("submit.sendAppLinkHelper").on("submit.sendAppLinkHelper", function (t) {
        t.preventDefault();
        n.checkValidity()
    })
};
sendAppLinkHelper.bindHideErrorOnChange = function () {
    var n = this;
    n.$input.off("input.bindHideErrorOnChange").on("input.bindHideErrorOnChange", function () {
        n.$input.hasClass("sendAppLink__input--error") && n.$input.removeClass("sendAppLink__input--error")
    })
};
sendAppLinkHelper.checkValidity = function () {
    var n = this, t = n.$input.inputmask("unmaskedvalue");
    /[0-9]{10}/.test(t) ? (n.$input.val(""), n.submit(t)) : n.$input.hasClass("sendAppLink__input--error") || n.$input.addClass("sendAppLink__input--error")
};
sendAppLinkHelper.submit = function (n) {
    var t = this;
    $.post("/util/send-app-link", {address: n});
    t.hidePopup()
};
$(document).ready(function () {
    sendAppLinkHelper.init()
});
kaspiMenuClass = function () {
    var n = {}, t = !1;
    this.init = function () {
        setupKaspiMenu();
        t = !0
    };
    setupKaspiMenu = function () {
        n = {
            containerId: null,
            menu: $("#kaspiMenuAdapt"),
            distance: 0,
            cont_val: 79,
            menu_val: -79,
            speed: 400,
            body: $("body"),
            html: $("html")
        };
        n.headers = $("header");
        n.footers = $("footer");
        n.main = $("main");
        n.distance = n.main.css("left");
        n.topOffset = 0;
        $("body").append(n.menu)
    };
    this.open = function (i) {
        if (($.cookie("is_mobile_app") != "true" || !window.mobapp || typeof window.mobapp.openMenu != "function") && (t || this.init(), n.active = !0, n.distance == "auto" || n.distance == "0px")) {
            n.topOffset = $("body").scrollTop();
            var r = $("#main").css("margin-top").replace("px", "") - n.topOffset;
            $("#main").css("margin-top", r + "px");
            animateKaspiMenu(n.cont_val, 0, i, !1);
            n.body.scrollTop(0)
        }
    };
    this.close = function (t) {
        n.active == !0 && (n.active = !1, animateKaspiMenu(0, n.menu_val, t, !0))
    };
    this.toggle = function () {
        n.active ? this.close(n.speed) : this.open(n.speed)
    };
    animateKaspiMenu = function (t, i, r, u) {
        n.headers.add(n.footers).add(n.main).animate({left: t + "vw"}, r);
        n.html.toggleClass("html--noscroll html--noPointerEvents");
        n.body.toggleClass("body--noscroll body--noPointerEvents");
        n.menu.animate({left: i + "vw"}, r, function () {
            if (u) {
                var t = $("#main").css("margin-top").replace("px", "") - 0 + n.topOffset;
                $("#main").css("margin-top", t + "px");
                $("body").scrollTop(n.topOffset)
            }
        })
    };
    this.isActive = function () {
        return n.active
    }
};
typeof kaspiMenu == "undefined" && (kaspiMenu = {});
kaspiMenu.menu = null;
kaspiMenu.init = function () {
    var n = kaspiMenu, t;
    (n.burgerBtn = $(".headerAdapt__navButton"), n.bindHamburger(), $.cookie("is_mobile_app") == "true" && window.mobapp && typeof window.mobapp.openMenu == "function") || (n.menu = new kaspiMenuClass, n.bindAccordion(), n.bindChangeLocale(), n.bindSelectRegion(), t = $(".kaspiMenu__item"), t.click(function () {
        t.removeClass("kaspiMenu__item--active");
        $(this).addClass("kaspiMenu__item--active")
    }))
};
kaspiMenu.toggle = function (n) {
    var t = kaspiMenu;
    n = n || window.event;
    n.stopPropagation();
    t.menu.isActive() ? t.hide(n) : t.show(n)
};
kaspiMenu.show = function (n) {
    var t = kaspiMenu;
    n = n || window.event;
    n.stopPropagation();
    t.menu.open(400);
    t.bindCloseOnBodyClick()
};
kaspiMenu.hide = function (n) {
    var t = kaspiMenu;
    n = n || window.event;
    n.preventDefault();
    t.menu.close(400);
    t.unbindCloseOnBodyClick()
};
kaspiMenu.fastHide = function (n) {
    var t = kaspiMenu;
    n = n || window.event;
    n.preventDefault();
    t.menu.close(0);
    t.unbindCloseOnBodyClick()
};
kaspiMenu.bindHamburger = function () {
    var n = this;
    n.burgerBtn.off("click.bindHamburger").on("click.bindHamburger", function (t) {
        t = t || window.event;
        t.preventDefault();
        $.cookie("is_mobile_app") == "true" && window.mobapp && typeof window.mobapp.openMenu == "function" ? window.mobapp.openMenu() : n.toggle(t)
    })
};
kaspiMenu.bindCloseOnResize = function () {
    var n = this;
    $(window).off("orientationchange.bindHamburger resize.bindHamburger").on("orientationchange.bindHamburger resize.bindHamburger", function (t) {
        t = t || window.event;
        t.preventDefault();
        n.fastHide(t)
    })
};
kaspiMenu.unbindCloseOnResize = function () {
    var n = this;
    $(window).off("orientationchange.bindHamburger resize.bindHamburger")
};
kaspiMenu.bindCloseOnBodyClick = function () {
    var n = this;
    $("header, footer, main").off("click.kaspiMenu").on("click.kaspiMenu", function (t) {
        t = t || window.event;
        t.preventDefault();
        n.hide(t)
    })
};
kaspiMenu.unbindCloseOnBodyClick = function () {
    var n = this;
    $("header, footer, main").off("click.kaspiMenu")
};
kaspiMenu.bindAccordion = function () {
    $(".kaspiMenu__user").off("click.kaspiMenu").on("click.kaspiMenu", function () {
        $(this).toggleClass("kaspiMenu__user--opened");
        $(".kaspiMenu__settings").toggle()
    })
};
kaspiMenu.bindChangeLocale = function () {
    var n = this;
    $("#menuSwitchLocale").off("click.kaspiMenu").on("click.kaspiMenu", function (n) {
        n = n || window.event;
        n.preventDefault();
        n.stopPropagation();
        var t = $(this), i = t.data("locale");
        $.ajax({
            url: "/SwitchLocale/" + i, type: "POST", dataType: "json", success: function (n) {
                n.status == "OK" && location.reload()
            }
        }).always(function () {
        })
    })
};
kaspiMenu.bindSelectRegion = function () {
    var n = this;
    $(".kaspiMenu__showRegionSelection").off("click.kaspiMenu").on("click.kaspiMenu", function (t) {
        t = t || window.event;
        var i = $(this);
        typeof selectRegionMobileHelper == "undefined" ? ($("body").mask(), $.ajax({
            url: "/SelectRegion/mobile",
            type: "POST",
            dataType: "html",
            success: function (t) {
                var i = $(t).find(".selectRegionAdapt__wrapper").addBack(".selectRegionAdapt__wrapper");
                i ? (n.fastHide(), $("body").append(i), $("body").unmask(), selectRegionMobileHelper.init()) : location.href = "/entrance"
            }
        })) : (selectRegionMobileHelper.show(), n.fastHide())
    })
};
$(function () {
    kaspiMenu.init()
});
logoutPopupHelper || (logoutPopupHelper = {});
logoutPopupHelper.init = function () {
    var n = this, t;
    (n.$body = $("body"), (n.$wrapper = $("#logoutPopup")).length) && (t = new Date, n.kaspiSignOutTimerDate = Date.parse(t), n.kaspiSignOutTimer = 9e5, localStorage && localStorage.setItem("kaspiSignOutTimer", t), n.bindTimeout(n.kaspiSignOutTimer))
};
logoutPopupHelper.bindTimeout = function (n) {
    var t = this;
    typeof commonAlert != "undefined" && (t.alert = new commonAlert(t.$wrapper));
    setTimeout(function () {
        if (t.kaspiSignOutTimerDate += t.kaspiSignOutTimer, localStorage && t.kaspiSignOutTimerDate < Date.parse(localStorage.getItem("kaspiSignOutTimer")) + t.kaspiSignOutTimer) {
            t.kaspiSignOutTimer = Date.parse(localStorage.getItem("kaspiSignOutTimer")) + t.kaspiSignOutTimer - t.kaspiSignOutTimerDate;
            t.bindTimeout(t.kaspiSignOutTimer);
            return
        }
        $.ajax({type: "POST", url: "/SignOut"}).always(function () {
            $.cookie("is_mobile_app") == "true" ? window.location = "/entrance" : (t.alert.show(), t.bindHideMessage())
        })
    }, n)
};
logoutPopupHelper.bindHideMessage = function () {
    var n = this;
    $("*").off("click").on("click.bindHideMessage", function () {
        n.$wrapper.fadeOut(200, function () {
            window.location = "/entrance"
        })
    });
    $(document).on("keydown.logoutPopupHelper", function (t) {
        t = t || window.event;
        var i = t.which || t.keyCode || t.charCode;
        i == 27 && n.$wrapper.fadeOut(200, function () {
            window.location = "/entrance"
        })
    })
};
$(document).ready(function () {
    logoutPopupHelper.init()
});
typeof uploadTipsHelper == "undefined" && (uploadTipsHelper = {});
uploadTipsHelper.init = function () {
    var n = this;
    n.loadTips()
};
uploadTipsHelper.loadTips = function () {
    var n = this;
    (n.$wrapper = $("#wrapperForTips[data-href]").first()).length && n.$wrapper.data("href") && $.ajax({
        dataType: "html",
        url: n.$wrapper.data("href"),
        cache: !1,
        success: function (t) {
            n.$wrapper.append(t);
            n.$wrapper.unmask()
        },
        error: function () {
            n.$wrapper.unmask()
        },
        beforeSend: function () {
            n.$wrapper.mask()
        }
    })
};
$(function () {
    uploadTipsHelper.init()
});
$(document).ready(function () {
    var t = $.cookie("k_stat"), n = document.createElement("img");
    n.height = 0;
    n.width = 0;
    t && (n.src = "https://stat.merca.kz/marker.png?source=kaspi_kz&id=" + t, document.getElementsByTagName("head")[0].appendChild(n))
});
Number.prototype.toFormatted || (Number.prototype.toFormatted = function (n, t) {
    return fnPrototypeToFormatted(this + "", n, t)
});
String.prototype.toFormatted || (String.prototype.toFormatted = function (n, t) {
    return fnPrototypeToFormatted(this + "", n, t)
});
registerClientContact = function () {
    $("*[data-sasresultid]").off("click.registerClientContact").on("click.registerClientContact", function () {
        var n = $(this), t = n.data("sasresultid");
        $.ajax({type: "POST", url: "/util/RegisterClientContact", async: !0, data: {controlSasResultId: t}}).done
    })
};
$(function () {
    registerClientContact()
});
Number.prototype.toFloat || (Number.prototype.toFloat = function () {
    return parseFloat((this + "").replace(/ /g, "").replace(/ /g, "").replace(/,/g, "."))
});
String.prototype.toFloat || (String.prototype.toFloat = function () {
    return parseFloat((this + "").replace(/ /g, "").replace(/ /g, "").replace(/,/g, "."))
});
deviceType = "";
document.addEventListener("DOMContentLoaded", function () {
    getDeviceType()
}), function (n) {
    n.fn.mask = function (t) {
        var i, r, u;
        (t || n.cookie("is_mobile_app") != "true") && (i = n(this), n(".kaspiPreloader__overlay").remove(), n("body").addClass("body--masked"), r = n('<div class="kaspiPreloader__overlay"><\/div>').on("click", function (n) {
            n = n || window.event;
            n.stopPropagation()
        }), i.append(r), u = n('<div class="kaspiPreloader__wrapper"><div class="kaspiPreloader__loader"><\/div><svg class="kaspiPreloader__svg"><circle cx="69" cy="69" r="67" fill="none" stroke-width="2" class="kaspiPreloader__circle"><\/circle><\/svg><\/div>'), r.append(u), (document.documentMode || /Edge/.test(navigator.userAgent)) && (animateKaspiPreloaderSvg(i), animateKaspiPreloaderCircle(i)))
    };
    n.fn.unmask = function () {
        var t = n(this);
        t.find(".kaspiPreloader__wrapper, .kaspiPreloader__overlay").remove();
        n("body").removeClass("body--masked")
    }
}(jQuery);
kaspiAntsHelper = {};
kaspiAntsHelper.init = function () {
    var n = this;
    (n.$wrapper = $(".kaspi__ants")).length && n.bindCheckStatus()
};
kaspiAntsHelper.bindCheckStatus = function () {
    var n = this;
    setTimeout(function () {
        n.sendRequest()
    }, 1e3)
};
kaspiAntsHelper.sendRequest = function () {
    var n = this;
    $.ajax({
        url: "/GetProductLoadStatus", data: {}, type: "POST", dataType: "json", success: function (t) {
            t == "InProcess" ? setTimeout(function () {
                n.sendRequest()
            }, 1e3) : t == "Failed" ? location.reload() : t == "Completed" && location.reload()
        }
    }).always(function () {
    }).fail(function () {
    })
};
$(function () {
    kaspiAntsHelper.init()
});
typeof failureMessageHelper == "undefined" && (failureMessageHelper = {});
failureMessageHelper.init = function () {
    var n = this;
    (n.$wrapper = $(".failureMessage__wrapper")).length && (n.bindHide(), n.bindHideAccountLoadFailureMessage(), n.bindOldBrowserMessage())
};
failureMessageHelper.bindHide = function () {
    var n = this;
    n.$close = $(".failureMessage__close", n.$wrapper);
    n.$close.off("click.failureMessageHelper").on("click.failureMessageHelper", function () {
        var t = $(this);
        t.hide();
        n.$wrapper.removeClass("failureMessage__wrapper--active")
    })
};
failureMessageHelper.bindHideAccountLoadFailureMessage = function () {
    var n = this;
    if (n.$wrapper.attr("id") == "AccountLoadFailureMessage") n.$close.off("click.failureMessageHelperAccountLoadFailureMessage").on("click.failureMessageHelperAccountLoadFailureMessage", function () {
        $.cookie("AccountLoadFailureMessageShown", "true", {path: "/"})
    })
};
failureMessageHelper.bindOldBrowserMessage = function () {
    var t = this, n;
    t.getCookie("is_mobile_app") || $("body").hasClass("body--mobile") || (n = [{
        name: "Chrome",
        minVersion: 49
    }, {name: "MSIE", minVersion: 11}, {name: "Firefox", minVersion: 52}, {
        name: "Opera",
        minVersion: 45
    },], n.filter(function (n) {
        var r = new RegExp(n.name + "\\W\\d+"), i = r.exec(navigator.userAgent), t;
        if (!!i && (t = /\d+/.exec(i[0]), !!t && n.minVersion > t[0])) {
            $("#oldBrowserMessage").addClass("failureMessage__wrapper--active").show();
            return
        }
    }))
};
failureMessageHelper.getCookie = function (n) {
    var i = document.cookie, u = n + "=", t = i.indexOf("; " + u), r;
    if (t == -1) {
        if (t = i.indexOf(u), t != 0) return null
    } else t += 2, r = document.cookie.indexOf(";", t), r == -1 && (r = i.length);
    return decodeURI(i.substring(t + u.length, r))
};
$(function () {
    failureMessageHelper.init()
});
commonAlertHelper = {};
commonAlertHelper.init = function () {
    var n = this;
    n.$body = $("body");
    commonAlertHelper.defaultAlert()
};
commonAlertHelper.defaultAlert = function () {
    var n = this;
    $(".commonAlert__overflow--active").each(function () {
        var n = $(this), t = new commonAlert(n);
        t.show()
    })
};
$(function () {
    commonAlertHelper.init()
});
commonAlert || (commonAlert = function (n) {
    this.init = function () {
        var t = this;
        t.$html = $("html");
        t.$body = $("body");
        t.$wrapper = $(n);
        t.bindHideMessage()
    };
    this.bindHideMessage = function () {
        var n = this;
        n.$wrapper.add(".commonAlert__close", n.$wrapper).add(".commonAlert__buttonClose", n.$wrapper).on("click.commonAlert", function () {
            n.$wrapper.data("location-on-hide") ? window.location = n.$wrapper.data("location-on-hide") : ($("body").unmask(), n.hide())
        });
        $(".commonAlert__wrapper", n.$wrapper).on("click.commonAlert", function (n) {
            n = n || window.event;
            n.stopPropagation()
        })
    };
    this.setTitle = function (n) {
        var t = this;
        t.$wrapper.find(".commonAlert__title").html(n)
    };
    this.setBody = function (n) {
        var t = this;
        t.$wrapper.find(".commonAlert__text").html(n)
    };
    this.show = function () {
        var n = this;
        deviceType != "Mobile" && typeof commonModalHelper != "undefined" && commonModalHelper.hideActiveModal();
        n.$wrapper.appendTo(n.$body).fadeIn(200, function () {
            n.$wrapper.addClass("commonAlert__overflow--active");
            n.$body.hasClass("body--blurred") || n.$body.hasClass("body--noscroll") ? n.wasBlurredEarlier = !0 : n.$body.addClass("body--blurred body--noscroll");
            n.$html.addClass("ntml--noscroll");
            n.bindHideOnEsc()
        })
    };
    this.hide = function () {
        var n = this;
        deviceType != "Mobile" && typeof commonModalHelper != "undefined" && commonModalHelper.showActiveModal();
        n.wasBlurredEarlier || n.$body.removeClass("body--blurred body--noscroll");
        n.$html.removeClass("ntml--noscroll");
        n.$wrapper.fadeOut(200, function () {
            n.$wrapper.removeClass("commonAlert__overflow--active")
        });
        $(document).off("keydown.commonAlertHelper")
    };
    this.bindHideOnEsc = function () {
        var n = this;
        $(document).one("keydown.commonAlertHelper", function (t) {
            t = t || window.event;
            var i = t.which || t.keyCode || t.charCode;
            i == 27 && n.hide()
        })
    };
    this.init()
});
commonModalHelper = {};
commonModalHelper.init = function () {
    var n = this;
    n.modal;
    n.activeModal;
    n.$body = $("body");
    commonModalHelper.defaultModal()
};
commonModalHelper.defaultModal = function () {
    var n = this;
    $(".commonModal__overflow").length && (n.modal = new commonModal($(".commonModal__overflow--active").first()), $(".commonModal__overflow--active").length && n.modal.show())
};
commonModalHelper.hideActiveModal = function () {
    var n = this;
    n.activeModal = $(".commonModal__overflow--active");
    n.activeModal.fadeOut(200)
};
commonModalHelper.showActiveModal = function () {
    var n = this;
    n.activeModal.length && n.activeModal.fadeIn(200)
};
$(function () {
    commonModalHelper.init()
});
commonModal || (commonModal = function (n) {
    this.init = function () {
        var t = this;
        t.$wrapper = $(n);
        t.$body = $("body");
        t.$html = $("html");
        t.bindHideMessage()
    };
    this.bindHideMessage = function () {
        var n = this;
        n.$wrapper.add($(".commonModal__close", n.$wrapper)).add(".commonModal__buttonClose", n.$wrapper).off("click.commonModal").on("click.commonModal", function () {
            n.$wrapper.data("location-on-hide") ? window.location = n.$wrapper.data("location-on-hide") : n.hide()
        });
        $(".commonModal__wrapper", n.$wrapper).off("click.commonModalPropogation").on("click.commonModalPropogation", function (n) {
            n = n || window.event;
            n.stopPropagation()
        })
    };
    this.show = function () {
        var n = this;
        n.$wrapper.appendTo(n.$body).fadeIn(200, function () {
            n.$wrapper.addClass("commonModal__overflow--active");
            n.$wrapper.data("no-blur") || n.$body.hasClass("body--blurred") || n.$body.hasClass("body--noscroll") ? n.$wrapper.data("no-blur") && !n.$body.hasClass("body--noscroll") ? n.$body.addClass("body--noscroll") : n.wasBlurredEarlier = !0 : n.$body.addClass("body--blurred body--noscroll");
            n.$html.addClass("ntml--noscroll");
            n.bindHideOnEsc()
        })
    };
    this.hide = function () {
        var n = this;
        n.$wrapper.data("no-blur") || n.wasBlurredEarlier ? n.$wrapper.data("no-blur") && !n.wasBlurredEarlier && n.$body.removeClass("body--noscroll") : n.$body.removeClass("body--blurred body--noscroll");
        n.$html.removeClass("ntml--noscroll");
        n.$wrapper.fadeOut(200, function () {
            n.$wrapper.removeClass("commonModal__overflow--active")
        });
        $(document).off("keydown.commonAlertHelper")
    };
    this.bindHideOnEsc = function () {
        var n = this;
        $(document).one("keydown.commonAlertHelper", function (t) {
            t = t || window.event;
            var i = t.which || t.keyCode || t.charCode;
            i == 27 && (n.$wrapper.data("location-on-hide") ? window.location = n.$wrapper.data("location-on-hide") : n.hide())
        })
    };
    this.init()
})
