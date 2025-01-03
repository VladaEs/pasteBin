import styles from './PasteOptions.module.css'
import PasteOptionSpan from './PasteOptionSpan/PasteOptionSpan';
import FormRowWrapper from '../formPaste/FormRowWrapper/FormRowWrapper';
import InputWrapper from '../formPaste/inputWrapper/InputWrapper';

const PasteOptions =(props )=>{


    return(
        <FormRowWrapper>
            <div className="  text-white flex-1"><PasteOptionSpan>Category</PasteOptionSpan></div>
            <InputWrapper>
            <select id="category" {...props.register} className="w-full gap-5 bg-gray-50 border border-gray-300 dark:text-neutral-400 text-sm rounded-md focus:ring-blue-500 focus:border-blue-500 block p-2.5  dark:bg-neutral-900 dark:border-neutral-700">
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