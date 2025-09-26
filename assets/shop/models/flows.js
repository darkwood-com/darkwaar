import React from 'react';
import { createRoot } from 'react-dom/client';
import FunctionFlow from './../components/flow-function/index.jsx'
import PromptFlow from './../components/flow-prompt/index.jsx'
import AssetsFlow from './../components/flow-assets/index.jsx'
import TextFlow from './../components/flow-text/index.jsx'
import CanvasFlow from './../components/flow-canvas/index.jsx'
import ObjectFlow from './../components/flow-object/index.jsx'
import { ClientType } from './client-type';


export const flows = {
  '@darkwaar-io/darkwaar-flow-function': FunctionFlow,
  '@darkwaar-io/darkwaar-flow-prompt': PromptFlow,
  '@darkwaar-io/darkwaar-flow-text': TextFlow,
  '@darkwaar-io/darkwaar-flow-assets': AssetsFlow,
  '@darkwaar-io/darkwaar-flow-canvas': CanvasFlow,
  '@darkwaar-io/darkwaar-flow-object': ObjectFlow,
}

export const flowsNames = {
  '@darkwaar-io/darkwaar-flow-function': 'Function Flow',
  '@darkwaar-io/darkwaar-flow-prompt': 'Prompt Flow',
  '@darkwaar-io/darkwaar-flow-text': 'Text Flow',
  '@darkwaar-io/darkwaar-flow-assets': 'Assets Flow',
  '@darkwaar-io/darkwaar-flow-canvas': 'Canvas Flow',
  '@darkwaar-io/darkwaar-flow-object': 'Object Flow',
}

export const flowsClients = {
  '@darkwaar-io/darkwaar-flow-function': [
      ClientType.DARKWAAR,
      ClientType.PHP,
      ClientType.NODE,
      ClientType.VSCODE,
    ],
  '@darkwaar-io/darkwaar-flow-prompt': [
      ClientType.DARKWAAR,
    ],
  '@darkwaar-io/darkwaar-flow-text': [
      ClientType.DARKWAAR,
    ],
  '@darkwaar-io/darkwaar-flow-assets': [
      ClientType.DARKWAAR,
    ],
  '@darkwaar-io/darkwaar-flow-canvas': [
    ClientType.DARKWAAR,
  ],
  '@darkwaar-io/darkwaar-flow-object': [
    ClientType.DARKWAAR,
  ],
}

