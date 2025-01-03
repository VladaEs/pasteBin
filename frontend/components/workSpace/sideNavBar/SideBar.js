import styles from './SideBar.module.css';
import TextFeild from "@/components/textFeild/TextFeild";
const SideBar = ()=>{

    return(
        <div className={`flex flex-col `}>
            <TextFeild> Public Pastes</TextFeild>
        </div>
    )

}
export default SideBar; 