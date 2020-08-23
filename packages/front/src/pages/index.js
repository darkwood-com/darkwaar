import React from 'react'
import {Home} from '../views'
import {withPage} from '../helpers'

export default ({location}) => {
  const HomePage = withPage(Home, 'home', {
    location: location,
    title: 'Darkwaar',
    description: 'Unified Workflow Automation Tool',
  })

  return <HomePage/>
}
