import FormRowWrapper from "../FormRowWrapper/FormRowWrapper";
import InputWrapper from "../inputWrapper/InputWrapper";
import PasteOptionSpan from "../../PasteOptions/PasteOptionSpan/PasteOptionSpan";

const PastePrivacy =(props)=>{

    return(
        <FormRowWrapper>
        <div className="  text-white flex-1"><PasteOptionSpan>Paste Privacy</PasteOptionSpan></div>

        <InputWrapper>
        
        <select id="category" {...props.register} className="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-neutral-900 dark:border-neutral-700">
                <option>Public</option>
                <option>Private</option>
             </select>
        
        
        </InputWrapper>

        </FormRowWrapper>

    )

}
export default PastePrivacy;