From: "Saved by Internet Explorer 11"
Subject: 
Date: Wed, 7 Sep 2016 16:21:03 -0600
MIME-Version: 1.0
Content-Type: text/html;
	charset="utf-8"
Content-Transfer-Encoding: quoted-printable
Content-Location: https://raw.githubusercontent.com/twbs/bootstrap/master/js/transition.js
X-MimeOLE: Produced By Microsoft MimeOLE V6.1.7601.17609

=EF=BB=BF<!DOCTYPE HTML>
<!DOCTYPE html PUBLIC "" ""><HTML><HEAD><META content=3D"IE=3D11.0000"=20
http-equiv=3D"X-UA-Compatible">

<META http-equiv=3D"Content-Type" content=3D"text/html; =
charset=3Dutf-8">
<META name=3D"GENERATOR" content=3D"MSHTML 11.00.9600.18377"></HEAD>
<BODY>
<PRE>/* =
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=0A=
 * Bootstrap: transition.js v3.3.7=0A=
 * http://getbootstrap.com/javascript/#transitions=0A=
 * =
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=0A=
 * Copyright 2011-2016 Twitter, Inc.=0A=
 * Licensed under MIT =
(https://github.com/twbs/bootstrap/blob/master/LICENSE)=0A=
 * =
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D */=0A=
=0A=
=0A=
+function ($) {=0A=
  'use strict';=0A=
=0A=
  // CSS TRANSITION SUPPORT (Shoutout: http://www.modernizr.com/)=0A=
  // =
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=
=3D=3D=3D=3D=3D=3D=3D=3D=3D=3D=0A=
=0A=
  function transitionEnd() {=0A=
    var el =3D document.createElement('bootstrap')=0A=
=0A=
    var transEndEventNames =3D {=0A=
      WebkitTransition : 'webkitTransitionEnd',=0A=
      MozTransition    : 'transitionend',=0A=
      OTransition      : 'oTransitionEnd otransitionend',=0A=
      transition       : 'transitionend'=0A=
    }=0A=
=0A=
    for (var name in transEndEventNames) {=0A=
      if (el.style[name] !=3D=3D undefined) {=0A=
        return { end: transEndEventNames[name] }=0A=
      }=0A=
    }=0A=
=0A=
    return false // explicit for ie8 (  ._.)=0A=
  }=0A=
=0A=
  // http://blog.alexmaccaw.com/css-transitions=0A=
  $.fn.emulateTransitionEnd =3D function (duration) {=0A=
    var called =3D false=0A=
    var $el =3D this=0A=
    $(this).one('bsTransitionEnd', function () { called =3D true })=0A=
    var callback =3D function () { if (!called) =
$($el).trigger($.support.transition.end) }=0A=
    setTimeout(callback, duration)=0A=
    return this=0A=
  }=0A=
=0A=
  $(function () {=0A=
    $.support.transition =3D transitionEnd()=0A=
=0A=
    if (!$.support.transition) return=0A=
=0A=
    $.event.special.bsTransitionEnd =3D {=0A=
      bindType: $.support.transition.end,=0A=
      delegateType: $.support.transition.end,=0A=
      handle: function (e) {=0A=
        if ($(e.target).is(this)) return e.handleObj.handler.apply(this, =
arguments)=0A=
      }=0A=
    }=0A=
  })=0A=
=0A=
}(jQuery);=0A=
</PRE></BODY></HTML>
