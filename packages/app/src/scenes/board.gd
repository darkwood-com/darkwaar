extends Node3D

var camera_scene = preload("res://src/nodes/camera.tscn")

func _ready():
	randomize()
	
	var camera = camera_scene.instantiate()
	add_child(camera)
	
	for i in range(3):
		for j in range(3):
			for k in range(3):
				if randi() % 2 == 0:
					var tile = get_tile("terrain") as CSGBox3D
					tile.position.x = -1 + i
					tile.position.y = -1 + j
					tile.position.z = -1 + k
					
					tile.material = StandardMaterial3D.new()
					var material = tile.material as StandardMaterial3D
					material.albedo_color = Color(randf(), randf(), randf())
					
					add_child(tile)
				else:
					var tile = get_tile("warrior") as CSGSphere3D
					tile.position.x = -1 + i
					tile.position.y = -1 + j
					tile.position.z = -1 + k
					
					tile.material = StandardMaterial3D.new()
					var material = tile.material as StandardMaterial3D
					material.albedo_color = Color(randf(), randf(), randf())
					
					add_child(tile)
	
	pass
	
func get_tile(name: String):
	return load("res://src/tiles/" + name + ".tscn").instantiate()
	
