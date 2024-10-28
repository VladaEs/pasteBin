import FormRowWrapper from "../FormRowWrapper/FormRowWrapper";
import PasteOptionSpan from "../../PasteOptions/PasteOptionSpan/PasteOptionSpan";
import InputWrapper from "./InputWrapper";
import { useState } from "react";
const TagsInput=()=>{
    const [tags, SetTags]= ([]);

    return(
        <FormRowWrapper>
            <div className="  text-white flex-1 "><PasteOptionSpan>Tags:</PasteOptionSpan></div>
            <InputWrapper>

            <div className="flex flex-row gap-5">
                <ul className={`flex flex-row flex-wrap `}>
                    <li>Tag 1 </li>
                    <li>Tag 2 </li>
                </ul>
                <input type='text'/>
            </div>
                </InputWrapper>
        </FormRowWrapper>
        
    )

}

export default TagsInput;