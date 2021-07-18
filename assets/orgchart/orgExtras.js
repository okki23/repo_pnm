

function toggleFullscreen(e) {
	e = e || document.documentElement, document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement ? document.exitFullscreen ? document.exitFullscreen() : document.msExitFullscreen ? document.msExitFullscreen() : document.mozCancelFullScreen ? document.mozCancelFullScreen() : document.webkitExitFullscreen && document.webkitExitFullscreen() : e.requestFullscreen ? e.requestFullscreen() : e.msRequestFullscreen ? e.msRequestFullscreen() : e.mozRequestFullScreen ? e.mozRequestFullScreen() : e.webkitRequestFullscreen && e.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT)
}

function clickExportButton() {
	$(".oc-export-btn").click()
}
  $(".addNodex").on("click", function () {
	alert("Hola")
}), $(function () {
	$("#text-search").bind("keyup change", function (e) {
		var t = $(this).val();
		$(".title, .content").removeHighlight(), t && $(".title, .content").highlight(t), $(".highlight").length ? ($("#resultadosBusqueda").show(), $("#btn-filter-node").show(), $("#resultadosBusqueda").text($(".highlight").length + " results"), $(".highlight").attr("id", "newId")) : ($("#resultadosBusqueda").hide(), $("#btn-filter-node").hide(), $("#resultadosBusqueda").text(""))
	})
}), jQuery.fn.highlight = function (e) {
	return this.each(function () {
		! function e(t, n) {
			var l = 0;
			if (3 == t.nodeType) {
				var a = t.data.toUpperCase().indexOf(n);
				if (a >= 0) {
					var i = document.createElement("span");
					i.className = "highlight";
					var o = t.splitText(a),
						r = (o.splitText(n.length), o.cloneNode(!0));
					i.appendChild(r), o.parentNode.replaceChild(i, o), l = 1
				}
			} else if (1 == t.nodeType && t.childNodes && !/(script|style)/i.test(t.tagName))
				for (var c = 0; c < t.childNodes.length; ++c) c += e(t.childNodes[c], n);
			return l
		}(this, e.toUpperCase())
	})
}, jQuery.fn.removeHighlight = function () {
	return this.find("span.highlight").each(function () {
		var e = this.parentNode;
		e.replaceChild(this.firstChild, this),
			function e(t) {
				for (var n = 0, l = t.childNodes, a = l.length; n < a; n++) {
					var i = l[n];
					if (1 != i.nodeType) {
						if (3 == i.nodeType) {
							var o = i.nextSibling;
							if (null != o && 3 == o.nodeType) {
								var r = i.nodeValue + o.nodeValue;
								new_node = t.ownerDocument.createTextNode(r), t.insertBefore(new_node, i), t.removeChild(i), t.removeChild(o), n--, a--
							}
						}
					} else e(i)
				}
			}(e)
	}).end()
}, $("#text-search").keyup(function () {
	$(this).val($(this).val().toLowerCase())
}), $("#Tools").on("click", function () {
	1 == this.checked ? ($("div.content > a.btn").show(), $("#labelTools").addClass("btn-warning"), $("#labelTools").removeClass("btn-default")) : ($("div.content > a.btn").hide(), $("#labelTools").addClass("btn-default"), $("#labelTools").removeClass("btn-warning"))
}), $("#Percentage").on("click", function () {
	1 == this.checked ? ($(".progress").show(), $("#labelPercentage").addClass("btn-warning"), $("#labelPercentage").removeClass("btn-default")) : ($(".progress").hide(), $("#labelPercentage").addClass("btn-default"), $("#labelPercentage").removeClass("btn-warning"))
}), $("#Grid").on("click", function () {
	1 == this.checked ? ($(".orgchart").attr("style", " background-image: linear-gradient(90deg, rgba(204, 204, 204, 0.50) 10%, rgba(0, 0, 0, 0) 10%), linear-gradient(rgba(204, 204, 204, 0.50) 10%, rgba(0, 0, 0, 0) 10%);"), $("#labelGrid").addClass("btn-warning"), $("#labelGrid").removeClass("btn-default")) : ($(".orgchart").attr("style", " background-image: none!important;"), $("#labelGrid").addClass("btn-default"), $("#labelGrid").removeClass("btn-warning"))
}), $("#aZOut").on("click", function () {
	var e = new WheelEvent("wheel", {
		deltaY: 100
	});
	document.getElementById("chart-container-new").dispatchEvent(e)
}), $("#aZIn").on("click", function () {
	var e = new WheelEvent("wheel", {
		deltaY: -100
	});
	document.getElementById("chart-container-new").dispatchEvent(e)
}), $(document).ready(function () {
	$('[data-action="tooltip"]').tooltip()
});

