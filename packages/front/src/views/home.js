import React from 'react'

const Home = () => {
  const options = {
    height: 200,
    width: 300,
    amplitude: 20,
    speed: 0.15,
    points: 3,
    fill: '#FF00FF'
  }

  let step = 0
  
  const calculateWavePoints = () => {
    const points = []
    for (let i = 0; i <= Math.max(options.points, 1); i ++) {
      const scale = 100
      const x = i / options.points * options.width
      const seed = (step + (i + i % options.points)) * options.speed * scale
      const height = Math.sin(seed / scale) * options.amplitude
      const y = Math.sin(seed / scale) * height  + options.height
      points.push({x, y})
    }
    return points
  }

  const buildPath = (points) => {
    let svg = `M ${points[0].x} ${points[0].y}`
    const initial = {
      x: (points[1].x - points[0].x) / 2,
      y: (points[1].y - points[0].y) + points[0].y + (points[1].y - points[0].y)
    }
    const cubic = (a, b) => ` C ${a.x} ${a.y} ${a.x} ${a.y} ${b.x} ${b.y}`
    svg += cubic(initial, points[1])
    let point = initial
    for (let i = 1; i < points.length - 1; i ++) {
      point = {
        x: (points[i].x - point.x) + points[i].x,
        y: (points[i].y - point.y) + points[i].y
      }
      svg += cubic(point, points[i + 1])
    }
    svg += ` L ${options.width} ${options.height}`
    svg += ` L 0 ${options.height} Z`
    return svg
  }
  
  const path = buildPath(calculateWavePoints());
  const svg = `<svg xmlns='http://www.w3.org/2000/svg' version='1.1' width='${options.width}' height='${options.height}'><path d='${path}' fill='${options.fill}' /></svg>`
  
  return (
    <>
      <div className="section-wrapper" style={{
        background: `url("data:image/svg+xml;utf8,${svg}")`
      }}>
        <section className="section container vh-100">
          <div className="row h-100 align-items-center">
            <div className="col-md-12 text-center">
              <h1>Darkwaar</h1>
              <p>Will you be the darkest one at waar ?</p>
            </div>
          </div>
        </section>
      </div>
    </>
  )
}

export default Home
