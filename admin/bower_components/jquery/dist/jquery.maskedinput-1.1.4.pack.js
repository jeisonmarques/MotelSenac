(function($) {
  $.fn.caret = function(b, c) {
    if (this.length == 0) return;
    if (typeof b == 'number') {
      c = (typeof c == 'number') ? c : b;
      return this.each(function() {
        if (this.setSelectionRange) {
          this.focus();
          this.setSelectionRange(b, c)
        } else if (this.createTextRange) {
          var a = this.createTextRange();
          a.collapse(true);
          a.moveEnd('character', c);
          a.moveStart('character', b);
          a.select()
        }
      })
    } else {
      if (this[0].setSelectionRange) {
        b = this[0].selectionStart;
        c = this[0].selectionEnd
      } else if (document.selection && document.selection.createRange) {
        var d = document.selection.createRange();
        b = 0 - d.duplicate().moveStart('character', -100000);
        c = b + d.text.length
      }
      return {
        begin: b,
        end: c
      }
    }
  };
  var q = {
    '9': "[0-9]",
    'a': "[A-Za-z]",
    '*': "[A-Za-z0-9]"
  };
  $.mask = {
    addPlaceholder: function(c, r) {
      q[c] = r
    }
  };
  $.fn.unmask = function() {
    return this.trigger("unmask")
  };
  $.fn.mask = function(m, n) {
    n = $.extend({
      placeholder: "",
      completed: null
    }, n);
    var o = new RegExp("^" + $.map(m.split(""), function(c, i) {
      return q[c] || ((/[A-Za-z0-9]/.test(c) ? "" : "\\") + c)
    }).join('') + "$");
    return this.each(function() {
      var d = $(this);
      var f = new Array(m.length);
      var g = new Array(m.length);
      var h = false;
      var j = false;
      var l = null;
      $.each(m.split(""), function(i, c) {
        g[i] = (q[c] == null);
        f[i] = g[i] ? c : n.placeholder;
        if (!g[i] && l == null) l = i
      });

      function focusEvent() {
        checkVal();
        writeBuffer();
        setTimeout(function() {
          $(d[0]).caret(h ? m.length : l)
        }, 0)
      };

      function keydownEvent(e) {
        var a = $(this).caret();
        var k = e.keyCode;
        j = (k < 16 || (k > 16 && k < 32) || (k > 32 && k < 41));
        if ((a.begin - a.end) != 0 && (!j || k == 8 || k == 46)) {
          clearBuffer(a.begin, a.end)
        }
        if (k == 8) {
          while (a.begin-- >= 0) {
            if (!g[a.begin]) {
              f[a.begin] = n.placeholder;
              if ($.browser.opera) {
                s = writeBuffer();
                d.val(s.substring(0, a.begin) + " " + s.substring(a.begin));
                $(this).caret(a.begin + 1)
              } else {
                writeBuffer();
                $(this).caret(Math.max(l, a.begin))
              }
              return false
            }
          }
        } else if (k == 46) {
          clearBuffer(a.begin, a.begin + 1);
          writeBuffer();
          $(this).caret(Math.max(l, a.begin));
          return false
        } else if (k == 27) {
          clearBuffer(0, m.length);
          writeBuffer();
          $(this).caret(l);
          return false
        }
      };

      function keypressEvent(e) {
        if (j) {
          j = false;
          return (e.keyCode == 8) ? false : null
        }
        e = e || window.event;
        var k = e.charCode || e.keyCode || e.which;
        var a = $(this).caret();
        if (e.ctrlKey || e.altKey) {
          return true
        } else if ((k >= 41 && k <= 122) || k == 32 || k > 186) {
          var p = seekNext(a.begin - 1);
          if (p < m.length) {
            if (new RegExp(q[m.charAt(p)]).test(String.fromCharCode(k))) {
              f[p] = String.fromCharCode(k);
              writeBuffer();
              var b = seekNext(p);
              $(this).caret(b);
              if (n.completed && b == m.length) n.completed.call(d)
            }
          }
        }
        return false
      };

      function clearBuffer(a, b) {
        for (var i = a; i < b && i < m.length; i++) {
          if (!g[i]) f[i] = n.placeholder
        }
      };

      function writeBuffer() {
        return d.val(f.join('')).val()
      };

      function checkVal() {
        var a = d.val();
        var b = l;
        for (var i = 0; i < m.length; i++) {
          if (!g[i]) {
            f[i] = n.placeholder;
            while (b++ < a.length) {
              var c = new RegExp(q[m.charAt(i)]);
              if (a.charAt(b - 1).match(c)) {
                f[i] = a.charAt(b - 1);
                break
              }
            }
          }
        }
        var s = writeBuffer();
        if (!s.match(o)) {
          d.val("");
          clearBuffer(0, m.length);
          h = false
        } else h = true
      };

      function seekNext(a) {
        while (++a < m.length) {
          if (!g[a]) return a
        }
        return m.length
      };
      d.one("unmask", function() {
        d.unbind("focus", focusEvent);
        d.unbind("blur", checkVal);
        d.unbind("keydown", keydownEvent);
        d.unbind("keypress", keypressEvent);
        if ($.browser.msie) this.onpaste = null;
        else if ($.browser.mozilla) this.removeEventListener('input', checkVal, false)
      });
      d.bind("focus", focusEvent);
      d.bind("blur", checkVal);
      d.bind("keydown", keydownEvent);
      d.bind("keypress", keypressEvent);
      if ($.browser.msie) this.onpaste = function() {
        setTimeout(checkVal, 0)
      };
      else if ($.browser.mozilla) this.addEventListener('input', checkVal, false);
      checkVal()
    })
  }
})(jQuery);