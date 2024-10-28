import styles from './PasteOptions.module.css'
import PasteOptionSpan from './PasteOptionSpan/PasteOptionSpan';
import FormRowWrapper from '../formPaste/FormRowWrapper/FormRowWrapper';
import InputWrapper from '../formPaste/Tags/InputWrapper';
const PasteOptions =()=>{


    return(
        <FormRowWrapper>
            <div className="  text-white flex-1"><PasteOptionSpan>Category</PasteOptionSpan></div>
            <InputWrapper>
            <select id="category" name="pasteCategory" className=" w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                 <option value="DEFAULT">None</option>
                 <option value="US">Cryptocurrency</option>
                 <option value="CA">Cybersecurity</option>
                 <option value="FR">Fixing</option>
                 <option value="DE">Gaming</option>
                 <option value="DE">Haiku</option>
                 <option value="DE">Help</option>
                 <option value="DE">History</option>
                 <option value="DE">Housing</option>
                 <option value="DE">Jokes</option>
                 <option value="DE">Money</option>
                 <option value="DE">Music</option>
                 <option value="DE">Photo</option>
                 <option value="DE">Software</option>
             </select>
             </InputWrapper>
        </FormRowWrapper>
    )

}

export default PasteOptions;