"use client"

import styles from './WorkSpace.module.css'
import TextArea from './TextArea/TextArea';
import TextFeild from '../textFeild/TextFeild';
import SideBar from './sideNavBar/SideBar';
import FormPaste from './formPaste/FormPaste';
const WorkSpace =(props)=>{

    return(
    <div className={` flex flex-col gap-1 border border-solid border-stone-700 rounded px-5 py-5 text-white ${styles.backgroundBlock}`} >
        <div className={`${styles.gridLayout}`}>

            <div> {/*section 1 from the right where the text area is*/}
                <TextFeild>New Paste</TextFeild>
                <TextArea />
                <TextFeild>Optional Paste Settings</TextFeild>
                <hr className="h-px my-2 bg-gray-200 border-0 dark:bg-gray-700"></hr>
                <FormPaste/>
            </div>

        <SideBar />

        
        </div>
        
    </div>


    )


}

export default WorkSpace;