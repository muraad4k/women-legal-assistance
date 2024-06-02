import React from 'react'
import CIT from './assets/CIT.jpeg'

function Section() {
  return (
    <div className='w-full h-auto md:h-[350px] bg-slate-300'>
      <div className='md:grid block md:grid-cols-2 justify-between md:gap-2 px-2'>
        <div>
            <h1 className='font-bold text-2xl py-8'>Hi, Welcome to CA20 React Course</h1>
            <p className='pb-5'>Start your journery as developer here</p>
            <button className='px-6 py-3 bg-blue-600 text-white rounded-lg'>Get started</button>
        </div>
        <div className='md:ml-auto'>
            <img src={CIT} className='w-79 h-[200px] mr-24 mt-10 rounded-md'/>
        </div>
      </div>
    </div>
  )
}

export default Section
