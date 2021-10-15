extends Spatial

var camera_scene = preload("res://src/nodes/camera.tscn")

func _ready():
	randomize()
	
	var camera = camera_scene.instance()
	add_child(camera)
	
	for i in range(3):
		for j in range(3):
			for k in range(3):
				if randi() % 2 == 0:
					var tile = get_tile("terrain") as CSGBox
					tile.translation.x = -1 + i
					tile.translation.y = -1 + j
					tile.translation.z = -1 + k
					
					tile.material = SpatialMaterial.new()
					var material = tile.material as SpatialMaterial
					material.albedo_color = Color(randf(), randf(), randf())
					
					add_child(tile)
				else:
					var tile = get_tile("warrior") as CSGSphere
					tile.translation.x = -1 + i
					tile.translation.y = -1 + j
					tile.translation.z = -1 + k
					
					tile.material = SpatialMaterial.new()
					var material = tile.material as SpatialMaterial
					material.albedo_color = Color(randf(), randf(), randf())
					
					add_child(tile)
	
	pass
	
func get_tile(name: String):
	return load("res://src/tiles/" + name + ".tscn").instance()
	
