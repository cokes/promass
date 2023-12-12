import { useState } from 'react'
import reactLogo from './assets/react.svg'
import viteLogo from '/vite.svg'
import './App.css'
import {AddEntrada} from "./components/AddEntrada";
import {GetEntradasSearch} from "./components/GetEntradasSearch.jsx";

function App() {
  const [count, setCount] = useState(0)



  return (
    <>
      <div className='parentForm'>
        <AddEntrada/>
      </div>

      <div className='search'>{
          <GetEntradasSearch/>
      }

      </div>
    </>
  )
}

export default App
