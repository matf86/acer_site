import EventHandlers from './EventHandlers';
import PluginProvider from './PluginProvider';

export default class Boot
{
    constructor() {
        new EventHandlers();
        new PluginProvider();
    }
}