import React from 'react'
import { Flows } from '../views'
import { withPage } from '../helpers'

export default ({ location }) => {
  const FlowsPage = withPage(Flows, 'flows', {
    location: location,
    title: 'Darkwaar',
    description: 'Unified Workflow Automation Tool',
  })

  return <FlowsPage />
}
