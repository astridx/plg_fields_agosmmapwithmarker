# plg_field_agosmmapwithmarker
This custom field plugin shows in the frontend a map to a specified 
address. 

# How to use in backend

To use a new `agosmmapwithmarker custom filed` you have to activate the 
extension.
To activate `plg_field_agosmmapwithmarker`, 
navigate to the Extension Manager and select `Extensions -> Plugins`. 
Search for `agosmmapwithmarker` and click on the status button, 
so that this shows a green symbol.

![plugins test administration 1](https://user-images.githubusercontent.com/9974686/49697812-31a32900-fbbc-11e8-8b25-e162b9c958a8.png)


Afterwards, this extension can be used like any other custom field. 
For example, open Content - Fields and click the `New` button. 
While creating the custom fields, you can enter the desired height of the map.

![beitrage neues feld test administration 1](https://user-images.githubusercontent.com/9974686/49697957-eb4ec980-fbbd-11e8-9135-9e02eb82c388.png)

Once the custom field has been saved, you can enter an address 
for each article in the tabulator fields.

![beitrage bearbeiten test administration](https://user-images.githubusercontent.com/9974686/49697973-205b1c00-fbbe-11e8-8079-a10dd4992dd6.png)


# How it looks in frontend

In the frontend, a map is displayed in the article. The map zooms to the coordinates of the entered address. 
Here you can see a standard marker.

![home 6](https://user-images.githubusercontent.com/9974686/49698008-8182ef80-fbbe-11e8-9ca2-500aff8f0c0f.png)


# FAQ
## How is the address found on the map?
This extension uses [Nominatin](https://nominatim.openstreetmap.org/) 
for converting the address into geographic data - [geocoding](https://en.wikipedia.org/wiki/Geocoding).

[Nominatin](https://nominatim.openstreetmap.org/) is a search 
engine for [OpenStreetMap](https://www.openstreetmap.org) data. 