if(!_.theme_timeline){_.theme_timeline=1;(function($){$.ra($.fa.anychart.themes.defaultTheme,{timeline:{interactivity:{zoomOnMouseWheel:!0,scrollOnMouseWheel:!0},defaultRangeMarkerSettings:{zIndex:30.1,scaleRangeMode:"consider"},defaultLineMarkerSettings:{zIndex:30.2,scaleRangeMode:"consider"},defaultTextMarkerSettings:{zIndex:30.3,scaleRangeMode:"consider",align:"top"},legend:{enabled:!1},axis:{enabled:!0,zIndex:35,height:32,stroke:"#004e72",fill:"#004e72",ticks:{enabled:!0,stroke:"2 #60899b",zIndex:36},labels:{padding:7.5,fontSize:12,fontColor:"#d6f8ff",
textOverflow:!0,format:"{%Value}",selectable:!1}},defaultSeriesSettings:{base:{direction:"auto",clip:!1},moment:{direction:"odd-even",connector:{length:"4%"},normal:{stroke:function(){return{color:$.Ql(this.sourceColor),thickness:1,dash:"2 2"}},markers:{enabled:!0},labels:{fontColor:"#212121",padding:5,enabled:!0,anchor:"left-center",width:120,background:{enabled:!0,fill:"#f2f8ff .7",corners:2,stroke:"#CECECE"},fontSize:11,offsetX:5}},zIndex:33,tooltip:{titleFormat:function(){return $.zs(this.x)}}},
range:{direction:"up",zIndex:34,height:25,normal:{labels:{enabled:!0,anchor:"left-center",format:"{%x}",fontColor:"#000"},fill:function(){return this.sourceColor+" 0.3"}},tooltip:{format:"Start: {%start}{type:date}\nEnd: {%end}{type:date}"}}}}});}).call(this,$)}