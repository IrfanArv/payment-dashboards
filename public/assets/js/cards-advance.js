"use strict";!function(){let o,r,e,a;r=(isDarkStyle?(o=config.colors_dark.cardColor,a=config.colors_dark.textMuted,e=config.colors_dark.bodyColor,config.colors_dark):(o=config.colors.cardColor,a=config.colors.textMuted,e=config.colors.bodyColor,config.colors)).headingColor;var l=document.querySelectorAll(".chart-progress"),l=(l&&l.forEach(function(o){var r=config.colors[o.dataset.color],e=o.dataset.series,r={chart:{height:53,width:43,type:"radialBar"},plotOptions:{radialBar:{hollow:{size:"33%"},dataLabels:{show:!1},track:{background:config.colors_label.secondary}}},stroke:{lineCap:"round"},colors:[r],grid:{padding:{top:-15,bottom:-15,left:-5,right:-15}},series:[e],labels:["Progress"]};new ApexCharts(o,r).render()}),document.querySelector("#reportBarChart")),i={chart:{height:200,type:"bar",toolbar:{show:!1}},plotOptions:{bar:{barHeight:"60%",columnWidth:"60%",startingShape:"rounded",endingShape:"rounded",borderRadius:4,distributed:!0}},grid:{show:!1,padding:{top:-20,bottom:0,left:-10,right:-10}},colors:[config.colors_label.primary,config.colors_label.primary,config.colors_label.primary,config.colors_label.primary,config.colors.primary,config.colors_label.primary,config.colors_label.primary],dataLabels:{enabled:!1},series:[{data:[40,95,60,45,90,50,75]}],legend:{show:!1},xaxis:{categories:["Mo","Tu","We","Th","Fr","Sa","Su"],axisBorder:{show:!1},axisTicks:{show:!1},labels:{style:{colors:a,fontSize:"13px"}}},yaxis:{labels:{show:!1}}},l=(null!==l&&new ApexCharts(l,i).render(),document.querySelector("#swiper-with-pagination-cards"));l&&new Swiper(l,{loop:!0,autoplay:{delay:2500,disableOnInteraction:!1},pagination:{clickable:!0,el:".swiper-pagination"}})}();