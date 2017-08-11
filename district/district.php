<?php
	require "DSD/Ampara.kml";

	# we open the file as an XML document
	doc = Document.new File.new("DSD/Ampara.kml");

	# we get all placemark elements as an array.
	//$all_pms = doc.elements.to_a("//Placemark");

	# we create our SQL file will all the insert statements
	//f = File.open "dump.sql", "w+"

	# we iterate over each Placemark element
	//all_pms.each do |pm|
	 # in my demo, the name of the polygon come from the child element name
	//pc_name = pm.elements['name'].text

	 # the polygon points come in 1 string by the format is not really MySQL
	 //raw_polygon = pm.elements['MultiGeometry/Polygon/outerBoundaryIs/LinearRing/coordinates'].text

	 # we need to remove the 3rd coord of each point as we don't need a z-axis in our demo
	 # we do a bit of formatting to please Mr MySQL
	 //pc_polygon =  raw_polygon.strip.gsub(',0','#').gsub(',',' ').gsub('#',',').strip[0..-2].split(',').collect!{|p| p.split.reverse!.join(' ')}.join(', ')
	 
	 # we concat all this nicely in 1 executable INSERT statement
	 //f << "INSERT INTO tbl_demo_polygons (name, polygon) VALUES ('#{pc_name}',PolygonFromText('Polygon((#{pc_polygon}))'));\n"
	//end

	# we close our stream
	//f.flush
	//f.close

	# happy days!
?>