jQuery(function (d) {
	var l = {},
	g = {},
	e = {},
	n = {
		controls: !0,
		details: !0,
		cats: !0,
		all: !0,
		navabove: !0,
		navbelow: !0,
		keys: !0,
		loop: !0,
		play: function () {},
		pause: function () {},
		stop: function () {},
		seek: function () {},
		mute: function () {},
		unmute: function () {},
		width: 675,
		cat: 0,
		video: "",
		prefix: "",
		sep: " - ",
		quality: "default",
		thumbs: 20,
		pages: 10
	};
	d.fn.startube = function (p) {
		d.extend(this, n, p);
		var m = d(this).attr("id"),
		h = {
			wrapper: d("#" + m + "-wrapper"),
			cats: d("#" + m + "-cats"),
			title: d("#" + m + "-title"),
			details: d("#" + m + "-details"),
			player: d("#" + m + "-player"),
			controls: d("#" + m + "-next")
		},
		b = this,
		k = this;
		d.extend(this, {
			StarTube: function () {
				h.wrapper.css("max-width", b.width);
				this.initCats();
				var a = this;
				a.data = [];
				this.find("li").each(function () {
					a.initVideo(this)
				});
				this.loadVideos();
				this.video = b.video && l[b.video] ? l[b.video] : this.data[0];
				this.setCurrentCategory(b.cat);
				e[this.video.id] || (e[this.video.id] = {});
				e[this.video.id].selectedCat = b.cat;
				this.displayedPage = -1;
				this.currentPage = this.loadPage(this.video.id);
				this.initPlayer();
				b.keys && d(document).keydown(function (f) {
					a.initKeys(f.keyCode)
				});
				this.initControls();
				this.loadVideo(l[this.video.id]);
				return this
			},
			initCats: function () {
				var a = h.cats.find("li"),
				f,
				c = !1,
				j = this;
				b.all ? (f = a[0], d(a[0]).show()) : (f = a[1], d(a[0]).hide());
				d(a).each(function (a, f) {
					d(f).find("a").attr("data-id").toString() == b.cat && (c = !0)
				});
				if (!b.cat || !c) b.cat = d(f).find("a").attr("data-id");
				b.cats && h.cats.find("a").click(function () {
					var a = d(this).attr("data-id");
					j.setCurrentCategory(a);
					j.initThumbs();
					j.currentPage = 0;
					j.loadVideos(a);
					j.rebuildThumbs();
					return ! 1
				})
			},
			initVideo: function (a) {
				var f = this;
				a = d(a);
				var c = a.find("a.thumb"),
				j = c.attr("data-id"),
				q = c.attr("href"),
				g = c.find("img").attr("alt"),
				e = a.find(".vidTitle").remove(),
				k = c.attr("data-cat").split(",");
				b.video == j && (b.all ? (k = h.cats.find("li"), b.cat = d(k[0]).find("a").attr("data-id")) : b.cat = k[0]);
				l[j] = {
					li: a,
					title: g,
					id: j,
					details: e,
					link: q
				};
				c.click(function (a) {
					f.update(a, this, "thumb")
				});
				return this
			},
			initPlayer: function () {
				h.player.tubeplayer({
					initialVideo: b.video.id,
					preferredQuality: b.quality,
					width: b.width,
					height: Math.round(9 * b.width / 16),
					onPlay: b.play,
					onPause: b.pause,
					onStop: b.stop,
					onSeek: b.seek,
					onMute: b.mute,
					onUnMute: b.unmute,
					onPlayerEnded: function () { ! 0 == b.loop && h.controls.find("a.next").trigger("click")
					}
				})
			},
			initKeys: function (a) {
				37 == a ? h.controls.find("a.prev").trigger("click") : (39 == a || 32 == a) && h.controls.find("a.next").trigger("click")
			},
			initControls: function () {
				if (!b.controls) return this;
				h.controls.html('<a href="#" class="prev" title="' + b.prev + '">' + b.prev + '</a> <a href="#" class="next" title="' + b.next + '">' + b.next + "</a>");
				h.controls.find("a").click(function (a) {
					e[k.video.id].selectedCat != b.cat && (k.currentPage = e[k.video.id].page, k.setCurrentCategory(e[k.video.id].selectedCat), k.loadVideos(e[k.video.id].selectedCat), k.rebuildThumbs());
					k.update(a, this, "control")
				});
				h.controls.find("a.prev").attr("data-id", this.getVideo(0));
				h.controls.find("a.next").attr("data-id", this.getVideo(1))
			},
			loadVideos: function (a) {
				var f = 0,
				c = 0;
				a || (a = b.cat);
				g = {};
				var j = this;
				j.data = [];
				this.find("li > a").each(function () {
					var b = d(this).attr("data-cat").split(",");
					if (0 <= d.inArray(a.toString(), b) || !1 == a) b = d(this).attr("data-id"),
					e[b] || (e[b] = {}),
					e[b].catId = a,
					0 == f && void 0 == e[b].selectedCat && (e[b].selectedCat = a),
					0 == f % j.thumbs && 1 < f && c++,
					f++,
					g[c] || (g[c] = []),
					g[c].push(b),
					j.data.push(l[b])
				})
			},
			loadVideo: function (a, f) {
				this.currentPage = this.loadPage(a.id);
				"page" != f && (this.video = a, e[a.id] || (e[a.id] = {}), e[a.id].selectedCat = h.cats.find(".active").attr("data-id"), e[a.id].page = this.currentPage, b.controls && (h.controls.find("a.prev").attr("data-id", this.getVideo(0)), h.controls.find("a.next").attr("data-id", this.getVideo(1))), h.title.html('<a href="' + a.link + '" target="_blank">' + (b.prefix ? "<span>" + b.prefix + "</span>" + b.sep + a.title: a.title) + "</a>"), b.details && h.details.html(a.details));
				return this.initThumbs()
			},
			getVideo: function (a) {
				var b = this.video.id,
				c;
				for (c in g) for (var j = 0; j <= g[c].length; j++) if (this.video.id == g[c][j]) if (a) if (g[c][j + 1]) b = g[c][j + 1];
				else var d = (parseInt(c) + 1).toString(),
				b = g[d] && g[d][0] ? g[d][0] : g[0][0];
				else g[c][j - 1] ? b = g[c][j - 1] : (d = (parseInt(c) - 1).toString(), g[d] && g[d][g[d].length - 1] && (b = g[d][g[d].length - 1]));
				this.video.id == b && !a && (b = g[c][g[c].length - 1]);
				return b
			},
			update: function (a, b, c) {
				b = d(b).attr("data-id");
				video = l[b];
				if (!video) return ! 1;
				this.loadVideo(video, c);
				a.preventDefault();
				"page" != c && h.player.tubeplayer("play", b);
				"thumb" == c && d("html, body").animate({
					scrollTop: h.player.offset().top - 35
				},
				500)
			},
			getCurrentPage: function () {
				return this.currentPage
			},
			setCurrentCategory: function (a) {
				a && (h.cats.find(".active").removeClass("active"), h.cats.find('[data-id="' + a + '"]').addClass("active"));
				b.cat = a
			},
			initThumbs: function () {
				this.getCurrentPage() != this.displayedPage && this.rebuildThumbs();
				var a = this.children();
				a.filter(".selected").removeClass("selected");
				e[this.video.id].selectedCat == b.cat && a.find("[data-id=" + this.video.id + "]").parent("li").addClass("selected");
				return this
			},
			rebuildThumbs: function () {
				var a = this.getCurrentPage();
				this.find("li").each(function () {
					d(this).hide()
				});
				for (var f in g[a]) l[g[a][f]].li.fadeIn();
				this.displayedPage = a;
				b.navabove && this.buildPager("above");
				b.navbelow && this.buildPager("below");
				return this
			},
			loadPage: function (a) {
				var b = this.getCurrentPage(),
				c;
				for (c in g) for (var d = 0; d <= g[c].length; d++) a == g[c][d] && (b = c);
				return b
			},
			buildPager: function (a) {
				var f = d("div." + m + "-pager." + a);
				0 == f.length ? (f = d('<div class="' + m + "-pager " + a + '"></div>'), "above" == a ? f.insertBefore(this) : f.insertAfter(this)) : f.empty();
				if (! (this.data.length > b.thumbs)) return f.empty();
				a = 0;
				for (var c in g) a++;
				c = this.getCurrentPage();
				var j = c * b.thumbs,
				h = b.pages - 1,
				e = c - Math.floor((b.pages - 1) / 2) + 1;
				if (0 < e) {
					var k = a - e;
					k < h && (e -= h - k)
				}
				0 > e && (e = 0);
				0 < c && (k = j - b.thumbs, c = this.getCurrentPage(), c--, f.append('<a href="#" data-id="' + this.data[k].id + '" class="prev">&laquo;</a>'));
				0 < e && (this.buildPageLink(f, 0, a), 1 < e && f.append('<span class="skip">&hellip;</span>'), h--);
				for (; 0 < h;) this.buildPageLink(f, e, a),
				h--,
				e++;
				e < a && (c = a - 1, e < c && f.append('<span class="skip">&hellip;</span>'), this.buildPageLink(f, c, a));
				a = j + b.thumbs;
				a < this.data.length && (c = this.getCurrentPage(), c++, f.append('<a href="#" data-id="' + this.data[a].id + '" class="next">&raquo;</a>'));
				var l = this;
				f.find("a").click(function (a) {
					l.update(a, this, "page")
				});
				return this
			},
			buildPageLink: function (a, d, c) {
				var e = d + 1,
				g = this.getCurrentPage();
				d == g ? a.append('<span page="' + d + '" class="active">' + e + "</span>") : d < c && a.append('<a href="#" data-id="' + this.data[d * b.thumbs].id + '">' + e + "</a>");
				return this
			}
		});
		this.StarTube()
	}
});