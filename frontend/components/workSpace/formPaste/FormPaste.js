import PasteOptions from "../PasteOptions/PasteOptions";
import TagsInput from "./Tags/TagsInput";

const FormPaste =()=>{
    return(

        <form className={`wrapper w-full`}>
            <PasteOptions />
            <TagsInput/>
        </form>

    )

}

export default FormPaste;