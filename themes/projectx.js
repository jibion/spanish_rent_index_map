/**
 * AnyChart is lightweight robust charting library with great API and Docs, that works with your stack and has tons of chart types and features.
 *
 * Theme: projectx
 * Version: 1.0.0 (2022-09-17)
 */
(function() {
  "use strict";

  function a() {
    return window.anychart.color.setOpacity(this.sourceColor, 0.6, !0);
  }
  function b() {
    return window.anychart.color.darken(this.sourceColor);
  }
  function c() {
    return window.anychart.color.lighten(this.sourceColor);
  }
  var e = {
    palette: {
      type: "distinct",
      items: ["#fcfcfc", "#636363", "#898989", "#acacac", "#e1e1e1"]
    },
    defaultOrdinalColorScale: {
      autoColors: function(d) {
        return window.anychart.color.blendedHueProgression(
          "#e1e1e1",
          "#707070",
          d
        );
      }
    },
    defaultLinearColorScale: { colors: ["#e1e1e1", "#707070"] },
    defaultFontSettings: {
      fontFamily: "Plus Jakarta Sans, Verdana, Geneva, sans-serif",
      fontColor: "#656565"
    },
    defaultBackground: {
      fill: "#f8f8f8",
      stroke: "#f8f8f8",
      cornerType: "round",
      corners: 0
    },
    defaultAxis: {
      stroke: "#d7d7d7",
      ticks: { stroke: "#d7d7d7" },
      minorTicks: { stroke: "#ebebeb" }
    },
    defaultGridSettings: { stroke: "#d7d7d7" },
    defaultMinorGridSettings: { stroke: "#ebebeb" },
    defaultTooltip: {
      title: { fontColor: "#fcfcfc", padding: { bottom: 10 }, fontSize: 14 },
      separator: { enabled: !1 },
      fontColor: "#464646",
      fontSize: 13,
      background: { fill: "#e1e1e1 0.9", stroke: "#ffffff", corners: 5 },
      padding: { top: 8, right: 15, bottom: 10, left: 15 }
    },
    chart: {
      defaultSeriesSettings: {
        base: {
          selected: {
            fill: "#bdbdbd",
            stroke: "1.5 #d0d0d0"
          }
        },
        lineLike: {
          selected: {
            stroke: "3 #d0d0d0",
            markers: { enabled: !0, fill: "#bdbdbd", stroke: "1.5 #d0d0d0" }
          }
        },
        areaLike: {
          selected: {
            stroke: "3 #fcfcfc",
            markers: { enabled: !0, fill: "#bdbdbd", stroke: "1.5 #fcfcfc" }
          }
        },
        candlestick: {
          normal: {
            risingFill: "#fcfcfc",
            risingStroke: "#fcfcfc",
            fallingFill: "#acacac",
            fallingStroke: "#acacac"
          },
          hovered: {
            risingFill: c,
            risingStroke: b,
            fallingFill: c,
            fallingStroke: b
          },
          selected: {
            risingStroke: "3 #fcfcfc",
            fallingStroke: "3 #acacac",
            risingFill: "#333333 0.85",
            fallingFill: "#333333 0.85"
          }
        },
        ohlc: {
          normal: {
            risingStroke: "#fcfcfc",
            fallingStroke: "#acacac",
            markers: { enabled: !1 }
          },
          hovered: { risingStroke: b, fallingStroke: b },
          selected: { risingStroke: "3 #fcfcfc", fallingStroke: "3 #acacac" }
        }
      }
    },
    pieFunnelPyramidBase: {
      normal: { labels: { fontColor: null } },
      selected: {
        fill: "#bdbdbd",
        stroke: "1.5 #fcfcfc"
      },
      connectorStroke: "#d7d7d7",
      outsideLabels: { autoColor: "#959595" },
      insideLabels: { autoColor: "#fff" }
    },
    map: {
      unboundRegions: { enabled: !0, fill: "#f4f3f4", stroke: "#d0d0d0"},
      defaultSeriesSettings: {
        base: { normal: { labels: { fontColor: "#fafafa" } } },
        connector: {
          normal: {
            stroke: "1.5 #e0e0e0",
            markers: { fill: "#fcfcfc", stroke: "1.5 #F7F7F7" }
          },
          hovered: { markers: { fill: "#fcfcfc", stroke: "1.5 #F7F7F7" } },
          selected: {
            stroke: "1.5 #000",
            markers: { fill: "#000", stroke: "1.5 #F7F7F7" }
          }
        },
        marker: { normal: { labels: { fontColor: "#000" } } }
      }
    },
    sparkline: {
      padding: 0,
      background: { stroke: "#ffffff" },
      defaultSeriesSettings: {
        area: { stroke: "1.5 #fcfcfc", fill: "#fcfcfc 0.5" },
        column: { fill: "#fcfcfc", negativeFill: "#acacac" },
        line: { stroke: "1.5 #fcfcfc" },
        winLoss: { fill: "#fcfcfc", negativeFill: "#acacac" }
      }
    },
    bullet: {
      background: { stroke: "#ffffff" },
      defaultMarkerSettings: { fill: "#fcfcfc", stroke: "2 #fcfcfc" }
    },
    heatMap: {
      normal: { stroke: "1 #ffffff", labels: { fontColor: "#fcfcfc" } },
      hovered: { stroke: "1.5 #ffffff" },
      selected: {
        stroke: "2 #d0d0d0",
        fill: "#bdbdbd",
        hatchFill: { type: "percent20", color: "#fcfcfc" }
      }
    },
    treeMap: {
      normal: {
        headers: {
          background: { enabled: !0, fill: "#F7F7F7", stroke: "#B9B9B9" }
        },
        labels: { fontColor: "#fcfcfc" },
        stroke: "#B9B9B9"
      },
      hovered: {
        headers: {
          fontColor: "#959595",
          background: { fill: "#B9B9B9", stroke: "#B9B9B9" }
        }
      },
      selected: { labels: { fontColor: "#fafafa" }, stroke: "2 #eceff1" }
    },
    stock: {
      padding: [20, 30, 20, 60],
      defaultPlotSettings: {
        xAxis: { background: { fill: "#B9B9B9 0.5", stroke: "#B9B9B9" } }
      },
      scroller: {
        fill: "none",
        selectedFill: "#B9B9B9 0.5",
        outlineStroke: "#B9B9B9",
        defaultSeriesSettings: {
          base: {
            normal: { fill: "#999 0.6", stroke: "#999 0.6" },
            selected: { fill: a, hatchFill: null, stroke: a }
          },
          lineLike: {
            normal: { fill: "#999 0.6", stroke: "#999 0.6" },
            selected: { stroke: a }
          },
          areaLike: {
            normal: { fill: "#999 0.6", stroke: "#999 0.6" },
            selected: { stroke: a }
          },
          candlestick: {
            normal: {
              risingFill: "#999 0.6",
              risingStroke: "#999 0.6",
              fallingFill: "#999 0.6",
              fallingStroke: "#999 0.6"
            },
            selected: {
              risingStroke: a,
              fallingStroke: a,
              risingFill: a,
              fallingFill: a
            }
          },
          ohlc: {
            normal: { risingStroke: "#999 0.6", fallingStroke: "#999 0.6" },
            selected: { risingStroke: a, fallingStroke: a }
          }
        }
      }
    }
  };
  window.anychart = window.anychart || {};
  window.anychart.themes = window.anychart.themes || {};
  window.anychart.themes.projectx = e;
})();
