extends Camera

enum Mode {ROTATE, TRANSLATE}

var mode = Mode.ROTATE
var tween: Tween = null

func _ready():
	look_at_from_position(
		Vector3(-8, 8, -8),
		Vector3(0, 0, 0),
		Vector3(0, 1, 0)
	)

func _input(event):
	if event.is_action_pressed("ui_select"):
		mode = Mode.TRANSLATE if mode == Mode.ROTATE else Mode.ROTATE
	elif event.is_action_pressed("ui_left") and tween == null:
		self._on_translate_begin(Vector2(-1, 0))
	elif event.is_action_pressed("ui_right") and tween == null:
		self._on_translate_begin(Vector2(1, 0))
	elif event.is_action_pressed("ui_up") and tween == null:
		self._on_translate_begin(Vector2(0, -1))
	elif event.is_action_pressed("ui_down") and tween == null:
		self._on_translate_begin(Vector2(0, 1))
		
	if event is InputEventMouseMotion:		
		if event.relative.length() < 0.5 or tween:
			return
		
		if mode == Mode.ROTATE:
			return
		if mode == Mode.TRANSLATE:
			self._on_translate_begin(event.relative.normalized())

func _on_translate_begin(t: Vector2):
	tween = Tween.new()
	add_child(tween)
	tween.connect("tween_completed", self, "_on_translate_end")
	tween.interpolate_property(
		self,
		"translation",
		Vector3(self.translation.x, self.translation.y, self.translation.z),
		Vector3(self.translation.x - t.y, self.translation.y, self.translation.z + t.x).round(),
		1,
		Tween.TRANS_QUART,
		Tween.EASE_IN_OUT
	)
	tween.start()

func _on_translate_end(_object, _key):
	tween.queue_free()
	tween = null
