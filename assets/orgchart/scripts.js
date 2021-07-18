

"use strict";
! function (e) {
	function a(a) {
		if (a.length) {
			var t = e(".orgchart");
			t.addClass("noncollapsable"), t.find(".node").filter(function (t, n) {
					return e(n).text().toLowerCase().indexOf(a) > -1
				}).addClass("matched").closest("table").parents("table").find("tr:first").find(".node").addClass("retained"),
				t.find(".matched,.retained").each(function (a, t) {
					e(t).removeClass("slide-up").closest(".nodes").removeClass("hidden").siblings(".lines").removeClass("hidden");
					var n = e(t).closest("table").parent().siblings().find(".node:first:not(.matched,.retained)").closest("table").parent().addClass("hidden");
					n.parent().prev().children().slice(1, 2 * n.length + 1).addClass("hidden")
				}), t.find(".matched").each(function (a, t) {
					e(t).closest("tr").siblings(":last").find(".matched").length || e(t).closest("tr").siblings().addClass("")
				})
		} else swal({
			title: "Search",
			text: "Please write a word to search.",
			icon: "info",
			confirmButtonText: "Close",
			confirmButtonColor: "#3085d6"
		})
	}

	function t() {
		e(".orgchart").removeClass("noncollapsable").find(".node").removeClass("matched retained").end().find(".hidden").removeClass("hidden").end().find(".slide-up, .slide-left, .slide-right").removeClass("slide-up slide-right slide-left"), e("#resultadosBusqueda").hide(), e("#btn-filter-node").hide()
	}
	e("#btn-filter-node").on("click", function () {
		a(e("#text-search").val())
	}), e("#btn-cancel").on("click", function () {
		e("#text-search").val(""), t()
	}), e("#text-search").on("keyup", function (e) {
		13 === e.which ? a(this.value) : 8 === e.which && 0 === this.value.length && t()
	}), e(function () {
		var a = function () {
				return 1e3 * (new Date).getTime() + Math.floor(1001 * Math.random())
			},
			t = parseInt(e("#verticalDepth").val()),
			n = parseInt(e("#Depth").val()),
			l = e("#chart-container-new").orgchart({
				data: e("#mainContainer"),
				exportButton: !0,
				exportFilename: "ExportOrg",
				parentNodeSymbol: "fa-th-large",
				nodeTitle: "name",
				nodeId: "id",
				nodeContent: "title",
				draggable: !0,
				pan: !0,
				zoom: !0,
				verticalDepth: t,
				depth: n,
				initCompleted: function (a) {
					e("#loadingOrg").hide();
					var t = e("#chart-container-new");
					t.scrollLeft((t[0].scrollWidth - t.width()) / 2)
				},
				createNode: function (t, n) {
					t[0].id = a();
					var d = e('');
					t.children(".content").append(d), d.click(function () {
						var n = e("#selected-node-id").val(),
							d = a(),
							i = "New node",
							o = '<div class="row"><div class="col-md-3"><img height="40px;" src="assets/img/u.png" class="img-rounded"/></div><div class="col-md-9 text-left userName" title="' + i + '"><strong>' + i + '</strong></div></div><div class="row"><div class="col-md-12"><div data-action="tooltip" title="Productivity" class="progress" style="margin:10px 5px 5px 5px;"><div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">0%</div></div></div></div><div style="display: none" class="id">500</div>';
						e.ajax({
							url: "ajax/add.php",
							type: "POST",
							data: {
								rel: n,
								unicid: d,
								area: i
							},
							dataType: "html",
							success: function (e) {}
						});
						var r = e("#chart-container-new"),
							s = [];
						if (e("#new-nodelist").find(".new-node").each(function (e, a) {
								var t = a.value.trim();
								t.length && s.push(t)
							}), t.parent().attr("colspan") > 0) l.addSiblings(t.closest("tr").siblings(".nodes").find(".node:first"), {
							siblings: s.map(function (e) {
								return {
									name: e,
									title: o,
									relationship: "110",
									Id: d
								}
							})
						});
						else {
							var c = s.length > 1 ? "110" : "100";
							l.addChildren(t, {
								children: s.map(function (e) {
									return {
										name: e,
										title: o,
										relationship: c,
										Id: a()
									}
								})
							}, e.extend({}, r.find(".orgchart").data("options"), {
								depth: 0
							}))
						}
					});
					var i = e('');
					t.children(".content").append(i), i.click(function (a) {
						a.preventDefault();
						var t = e("#selected-node-id").val();
						e("#userProfile").appendTo("body").modal("show");
						var n = 0;
						e(".modal").on("shown.bs.modal", function (a) {
							e(".modal-backdrop:last").css("zIndex", 1051 + n), e(a.currentTarget).css("zIndex", 1052 + n), n++
						}), e(".modal").on("hidden.bs.modal", function (a) {
							n--, e(".modal").hasClass("in") && e("body").addClass("modal-open")
						}), e("#user-profile").html(""), e("#modal-loaderPU").show(), e.ajax({
							url: "ajax/userProfile.php",
							type: "POST",
							data: "id=" + t,
							dataType: "html"
						}).done(function (a) {
							e("#user-profile").html(""), e("#user-profile").html(a), e("#modal-loaderPU").hide()
						}).fail(function () {
							e("#user-profile").html('<i class="fa fa-info-circle"></i> An error ucurred, please try again.'), e("#modal-loaderPU").hide()
						})
					});
					var o = e('');
					t.children(".content").append(o), o.click(function (a) {
						a.preventDefault();
						var t = e("#selected-node-id").val();
						e("#userProfile").appendTo("body").modal("show");
						var n = 0;
						e(".modal").on("shown.bs.modal", function (a) {
							e(".modal-backdrop:last").css("zIndex", 1051 + n), e(a.currentTarget).css("zIndex", 1052 + n), n++
						}), e(".modal").on("hidden.bs.modal", function (a) {
							n--, e(".modal").hasClass("in") && e("body").addClass("modal-open")
						}), e("#user-profile").html(""), e("#modal-loaderPU").show(), e.ajax({
							url: "ajax/userProfileEdit.php",
							type: "POST",
							data: "id=" + t,
							dataType: "html"
						}).done(function (a) {
							e("#user-profile").html(""), e("#user-profile").html(a), e("#modal-loaderPU").hide()
						}).fail(function () {
							e("#user-profile").html('<i class="fa fa-info-circle"></i> An error ucurred, please try again.'), e("#modal-loaderPU").hide()
						})
					});
					var r = e('');
					t.children(".content").append(r), r.click(function () {
						if (t[0] === e(".orgchart").find(".node:first")[0]) var a = 0;
						else a = e("#selected-node-id").val();
						swal({
							title: "Are you sure?",
							text: "All related nodes will be deleted.",
							icon: "warning",
							buttons: !0,
							dangerMode: !0
						}).then(function (n) {
							n && e.ajax({
								url: "ajax/delete.php",
								type: "POST",
								data: {
									id: a
								},
								dataType: "html",
								success: function (e) {
									1 == e ? (l.removeNodes(t), swal({
										title: "All right",
										text: "The changes were saved correctly.",
										icon: "success",
										confirmButtonText: "Close",
										confirmButtonColor: "#3085d6"
									})) : swal({
										title: "Error",
										icon: "Something went wrong, the process could not be completed.",
										icon: "error",
										confirmButtonText: "Close",
										confirmButtonColor: "#3085d6"
									})
								}
							})
						})
					})
				}
			});
		l.$chart.on("nodedropped.orgchart", function (a) {
			console.log("draggedNode:" + a.draggedNode.children(".id").text() + ", dragZone:" + a.dragZone.children(".id").text() + ", dropZone:" + a.dropZone.children(".id").text());
			var t = a.draggedNode.children(".id").text(),
				n = a.dropZone.children(".id").text();
			e("#rel_" + t).val(n);
			a.dropZone.children(".id").text();
			e.ajax({
				url: "ajax/updateMove.php",
				type: "POST",
				data: {
					rel: n,
					unicid: t
				},
				dataType: "html",
				success: function (e) {}
			})
		}), l.$chart.on("mouseover", ".node", function () {
			var a = e(this);
			e("#selected-node").val(a.find(".title").text()).data("node", a), e("#selected-node-id").val(a.find(".id").text()).data("node", a)
		}), e("#btn_expand").on("click", function () {
			var e = l.$chart.find(".hidden").removeClass("hidden");
			e[0].offsetWidth, e.find(".slide-up").removeClass("slide-up")
		}), e("#btn_collapse").on("click", function () {
			l.hideChildren(l.$chart.find(".node:first"))
		}), e("#Pan").on("click", function () {
			l.setOptions("pan", this.checked), 1 == this.checked ? (e("#labelPan").addClass("btn-warning"), e("#labelPan").removeClass("btn-default")) : (e("#labelPan").addClass("btn-default"), e("#labelPan").removeClass("btn-warning"))
		}), e("#Zoom").on("click", function () {
			l.setOptions("zoom", this.checked), 1 == this.checked ? (e("#Hzoom").show(), e("#labelZoom").addClass("btn-warning"), e("#labelZoom").removeClass("btn-default"), e("#aZOut").show(), e("#aZIn").show()) : (e("#Hzoom").hide(), e("#labelZoom").addClass("btn-default"), e("#labelZoom").removeClass("btn-warning"), e("#aZOut").hide(), e("#aZIn").hide())
		}), e("#Drag").on("click", function () {
			var a = e("#mainContainer");
			1 == this.checked ? (l.init({
				data: a,
				draggable: !0
			}), e("#labelDrag").addClass("btn-warning"), e("#labelDrag").removeClass("btn-default")) : (l.init({
				data: a,
				draggable: !1
			}), e("#labelDrag").addClass("btn-default"), e("#labelDrag").removeClass("btn-warning"))
		}), e("#btn-reset").on("click", function (a) {
			var t = e("#mainContainer");
			l.init({
				data: t
			}), e("#Percentage").prop("checked", !0), e("#Tools").prop("checked", !0), e("#Zoom").prop("checked", !0), e("#Pan").prop("checked", !0), e("#Grid").prop("checked", !0), e("#Drag").prop("checked", !0), e("#labelPercentage").addClass("btn-warning"), e("#labelTools").addClass("btn-warning"), e("#labelZoom").addClass("btn-warning"), e("#labelPan").addClass("btn-warning"), e("#labelGrid").addClass("btn-warning"), e("#labelDrag").addClass("btn-warning"), e("#aZOut").show(), e("#aZIn").show()
		}), e("#btnL2R").on("click", function (a) {
			var t = parseInt(e("#verticalDepth").val()),
				n = parseInt(e("#Depth").val()),
				d = e("#mainContainer");
			l.init({
				data: d,
				direction: "l2r",
				verticalDepth: t,
				depth: n
			}), e("div.content > a.btn").hide(), e(".progress").hide(), e("#Tools").prop("checked", !1), e("#Percentage").prop("checked", !1), e("#labelTools").addClass("btn-default"), e("#labelTools").removeClass("btn-warning"), e("#labelPercentage").addClass("btn-default"), e("#labelPercentage").removeClass("btn-warning")
		}), e("#btnR2L").on("click", function (a) {
			var t = parseInt(e("#verticalDepth").val()),
				n = parseInt(e("#Depth").val()),
				d = e("#mainContainer");
			l.init({
				data: d,
				direction: "r2l",
				verticalDepth: t,
				depth: n
			}), e("div.content > a.btn").hide(), e(".progress").hide(), e("#Tools").prop("checked", !1), e("#Percentage").prop("checked", !1), e("#labelTools").addClass("btn-default"), e("#labelTools").removeClass("btn-warning"), e("#labelPercentage").addClass("btn-default"), e("#labelPercentage").removeClass("btn-warning")
		}), e("#btnVertical").on("click", function (a) {
			var t = parseInt(e("#verticalDepth").val()),
				n = parseInt(e("#Depth").val()),
				d = e("#mainContainer");
			l.init({
				data: d,
				direction: "t2b",
				verticalDepth: t,
				depth: n
			}), e("div.content > a.btn").show(), e(".progress").show(), e("#Tools").prop("checked", !0), e("#Percentage").prop("checked", !0), e("#labelTools").removeClass("btn-default"), e("#labelTools").addClass("btn-warning"), e("#labelPercentage").removeClass("btn-default"), e("#labelPercentage").addClass("btn-warning")
		}), e("#verticalDepth").on("keyup, change, click", function (a) {
			var t = parseInt(e("#verticalDepth").val()),
				n = parseInt(e("#Depth").val()),
				d = e("#mainContainer");
			l.init({
				data: d,
				verticalDepth: t,
				depth: n
			})
		}), e("#Depth").on("keyup, change, click", function (a) {
			var t = parseInt(e("#verticalDepth").val()),
				n = parseInt(e("#Depth").val()),
				d = e("#mainContainer");
			l.init({
				data: d,
				verticalDepth: t,
				depth: n
			})
		})
	})
}(jQuery);

