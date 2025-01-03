import Image from "next/image";

import Header from '../components/header/Header'

import WorkSpace from "@/components/workSpace/WorkSpace";
export default function Home() {
  return (
    <div className='mb-5 flex flex-col'>
      <Header />
      <div className='spaceSide'>
      <WorkSpace>

        
        


      </WorkSpace>

      </div>
    </div>
  );
}
