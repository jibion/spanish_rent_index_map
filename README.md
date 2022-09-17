# Spanish Index Rent Map
🗺️ Web Visualization for the public data of the Spanish Home Rent Index

![image](https://user-images.githubusercontent.com/11091182/190858953-f7c848ce-ce9a-48de-9d1b-9300ae7b21b8.png)

## Description:
This repository uses [AnyChart - JS charts](https://www.anychart.com/) Trial Version to make a choropleth visualization of the Spanish Rent Index by provinces.

## Installation:
Just download the repository and open the `index.html` file in your browser

## Customization:
Data was created using the [spanish_rent_price_index](https://github.com/jibion/spanish_rent_price_index) repository, but you can customize it with your own data changing the following lines accordingly:

```
anychart.data.loadJsonFile(
        './data/data_vc.json',
```
And if you want to change the map with another one, change the following line accordingly:
```
<script src="./geodata/countries/spain/spain.js"></script>
```
For style customizations, most of the style is defined in the theme. Change those lines if you want to add your own theme:
```
<script src="./themes/projectx.js"></script>
```
and 
```
anychart.theme(anychart.themes.projectx);
```

## Live Demo:
[Stage version](https://hackthedad.com/provincias_mapa/)
